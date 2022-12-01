const searchForm = document.getElementById("search-product");

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
                    posts.innerHTML += `<div class="card mr-5" style="width: 18rem;">
            <img src="assets/dist/img/avatar.png"


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
                    posts.innerHTML = `<div class="alert alert-danger" role="alert">
                    Aucun résultat trouvé
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
