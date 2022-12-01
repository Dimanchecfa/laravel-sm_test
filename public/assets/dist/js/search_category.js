const searchCategoryForm = document.getElementById("search_category");
const key2 = document.querySelector('meta[name="csrf-token2"]').content;

searchCategoryForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const url = searchCategoryForm.getAttribute("action");
    const search = document.getElementById("category").value;

    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": key2,
        },
        body: JSON.stringify({
            search: search,
        }),
    })
        .then((response) => {
            response.json().then((data) => {
                const categories = document.getElementById("categories");
                categories.innerHTML = "";

                Object.entries(data)[0][1].forEach((element) => {
                    categories.innerHTML += `<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">

                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <p class="lead text-underline"><b class="">
                                            Type :
                                        </b>
                                        <span class="text-bold text-lg">
                                           ${element.type}
                                        </span>

                                    </p>
                                    <p class="lead"><b>
                                            Description:
                                        </b>
                                        <span class="text-bold text-lg">
                                            ${element.description}
                                        </span>

                                    </p>
                                    <p class="lead"><b>
                                            Nombre de produits:
                                        </b>
                                        <span class="text-bold text-lg">
                                            ${
                                                Object.entries(data)[0][1]
                                                    ?.length
                                            }
                                        </span>

                                    </p>

                                </div>
                                <div class="col-5 text-center">
                                    <img src="assets/dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="category/product/${element?.id}"

                                class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i> Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>`;
                });

                if (Object.entries(data)[0][1].length == 0) {
                    categories.innerHTML = `<div class="alert alert-danger" role="alert">
                    Aucun résultat trouvé
                  </div>`;
                }
            });
        })
        .catch((error) => {
            console.log(error);
        });
});

document.getElementById("category").addEventListener("keyup", (e) => {
    e.preventDefault();
    searchCategoryForm.dispatchEvent(new Event("submit"));
});
