const searchCategoryProduct = document.getElementById("search_product");
const key = document.querySelector('meta[name="csrf-token1"]').content;

searchCategoryProduct.addEventListener("submit", (e) => {
    e.preventDefault();
    const url = searchCategoryProduct.getAttribute("action");
    console.log(url);
    const search = document.getElementById("query").value;

    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": key,
        },
        body: JSON.stringify({
            search: search,
        }),
    })
        .then((response) => {
            response.json().then((data) => {
                const products = document.getElementById("products");
                products.innerHTML = "";

                Object.entries(data)[0][1].forEach((element) => {
                    products.innerHTML += `<div class="card mr-5" style="width: 18rem;">
            <img src="../../assets/dist/img/avatar2.png"


            class="card-img-top" alt="..." style="width: 150px; height: 150px; margin: 0 auto;">
            <div class="card-body">
                <h5 class="card-title">
                   ${element.nom}
                </h5>
                <p class="card-text">
                    ${element.description}
                </p>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg${element.id}">
                    Voir plus
                </a>
                <div class="modal fade" id="modal-lg${element.id}">
                    <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">
                  ${element.nom}</h4>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>
                    ${element.description}
                  </p>
                </div>
                <div class="modal-footer justify-content-between">
                  <button
                    type="button"
                    class="btn btn-default"
                    data-dismiss="modal"
                  >
                    Close
                  </button>
                  <button type="button" class="btn btn-primary">
                    Save changes
                  </button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
            </div>
        </div>`;
                });

                if (Object.entries(data)[0][1].length == 0) {
                    products.innerHTML = `<div class="alert alert-danger" role="alert">
                    Aucun résultat trouvé
                  </div>`;
                }
            });
        })
        .catch((error) => {
            console.log(error);
        });
});
document.getElementById("query").addEventListener("keyup", (e) => {
    e.preventDefault();
    searchCategoryProduct.dispatchEvent(new Event("submit"));
});
