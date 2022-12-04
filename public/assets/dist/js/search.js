const searchForm = document.getElementById("search-product");

const formatProductTitle = (product) => {
    return product.length > 20 ? product.substring(0, 20) + "..." : product;
};

const formatPath = (path) => {
    return path.replace("public/", "storage/");
};

searchForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const url = searchForm.getAttribute("action");
    const search = document.getElementById("q").value;
    const token = document.querySelector('meta[name="csrf-token"]').content;

    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": token,
        },
        body: JSON.stringify({
            search: search,
        }),
    })
        .then((response) => {
            response.json().then((data) => {
                const posts = document.getElementById("posts");
                posts.innerHTML = "";

                Object.entries(data)[0][1].forEach((element) => {
                    posts.innerHTML += `
                    <div class="card mr-5" style="width: 18rem;">
                    <div class="card-header pb-1">

                        <h5 class="card-title">
                            Nom : <span class="text-lg text-bold text-uppercase">${formatProductTitle(
                                element.nom
                            )}</span>
                        </h5>

                    </div>
            <img src="${formatPath(element.image)}"

            class="card-img-top" alt="..." style="width: 250px; height: 170px; margin: 0 auto;">
            <div class="card-body">
                <p class="card-text">
                    ${element.description} <br>

                </p>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg${
                    element.id
                }">
                    Voir plus
                </a>
                <div class="modal fade" id="modal-lg${element.id}">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Informations sur le produit ${element.nom}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center p-2">
                                    <img class=" profile-user-img img-fluid"
                                        src="
                                        ${formatPath(element.image)}
                                    "
                                        alt="product picture" style=" width: 200px; height: 170px;" />
                                </div>


                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>
                                            Nom du produit
                                        </b> <b class="float-right text-muted">
                                            ${element.nom}
                                        </b>
                                    </li>
                                    <li class="list-group-item">
                                        <b>
                                            Prix du produit
                                        </b> <b class="float-right text-muted">
                                            ${element.prix} FCFA
                                        </b>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                Description du produit
                            </div>
                            <div class="card-body box-profile">
                                <h3 class="text-bold text-lg text-muted">
                                    ${element.description}

                                </h3>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Fermer
                </button>
            </div>
        </div>
    </div>
</div>
        </div>`;
                });

                if (Object.entries(data)[0][1].length == 0) {
                    categories.innerHTML = `<div class="alert alert-warning alert-dismissible px-4 col-md-10 offset-md-1">

        <h5><i class="icon fas fa-ban"></i>  Aucune categorie ne correspond à votre recherche!</h5>

    </div>`;
                }
            });
        })
        .catch((error) => {
            console.log(error);
        });
});

document.getElementById("q").addEventListener("keyup", (e) => {
    e.preventDefault();
    searchForm.dispatchEvent(new Event("submit"));
});
