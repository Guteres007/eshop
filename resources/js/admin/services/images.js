import axios from "axios";
import Dropzone, { createElement } from "dropzone";
import Sortable from "sortablejs";

export const imageResolver = () => {

    _sortableImage();
    _removeImageListener();
    Dropzone.autoDiscover = false;

    let myDropzone = new Dropzone("#image_uploader", {
        autoProcessQueue: true,
        parallelUploads: 1,
        previewTemplate: `


      <div id="template" class="file-row" style="max-width: 200px; display: inline-block; padding: 10px;">
        <!-- This is used as the file preview template -->
        <div>
            <span class="preview"><img data-dz-thumbnail /></span>
        </div>
        <div>
            <p class="name" data-dz-name></p>
            <strong class="error text-danger" data-dz-errormessage></strong>
        </div>
        <div>
            <p class="size" data-dz-size></p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
            </div>
        </div>
        <div>

        </div>
      </div>


    `,

        removedfile: function (file) {
            let productId = document.querySelector("#product_id").value;
            let image_name = file.name;

            let form = new FormData();
            form.image_name = image_name;
            axios.post(`/admin/product/${productId}/image-remove`, { ...form });
        },
    });

    myDropzone.on("removedfile", function (file) {
        file.previewElement.remove();
    });
    myDropzone.on("addedfile", (file) => {
        // console.log(file);
    });

    myDropzone.on("success", function (file, response) {
        let imageId = response;
        let productId = document.querySelector("#product_id").value;

        let span = document.createElement("span");
        span.classList.add("col-2");
        span.setAttribute("data-id", imageId);
        let card = `
            <div class="card">
              <img style="min-width:150px; width:100%" data-image-name="${file.name}" src="/storage/product-images/${productId}/${file.name}"/>
              <span class="remove-image btn btn-danger mt-2">Odstranit</span>
            </div>
        `;
        span.innerHTML = card;
        document.querySelector(".uploaded-images").appendChild(span);
        file.previewElement.remove();

        _removeImageListener();
    });
};

//----- private

const _sortableImage = () => {
    var el = document.querySelector(".uploaded-images");
    let productId = document.querySelector("#product_id").value;
    setTimeout(() => {
        new Sortable(el, {
            animation: 150,
            ghostClass: "sortable-ghost",
            store: {
                set: function (sortable) {
                    var elements = sortable.el.children;

                    let newArrayOfImages = { [productId]: [] };
                    elements.forEach((element) => {
                        newArrayOfImages[productId].push(
                            element.getAttribute("data-id")
                        );
                    });
                    let form = new FormData();

                    form.image_data = newArrayOfImages;

                    axios
                        .post(`/admin/product/${productId}/image-sorting`, {
                            ...form,
                        })
                        .then(({ data }) => {
                            console.log(data);
                        });
                },
            },
        });
    }, 1000);
};

const _removeImageListener = () => {
    setTimeout(() => {
        document
            .querySelectorAll(".uploaded-images .remove-image")
            .forEach((removeButton) => {
                removeButton.addEventListener("click", (e) => {
                    let productId = document.querySelector("#product_id").value;
                    let image_name = e.target.parentElement
                        .querySelector("img")
                        .getAttribute("data-image-name");

                    let form = new FormData();
                    form.image_name = image_name;
                    axios
                        .post(`/admin/product/${productId}/image-remove`, {
                            ...form,
                        })
                        .then((data) => {
                            console.log(data);
                            //odstraní obrázek plus span i s html
                            e.target.parentElement.parentElement.remove();
                        });
                });
            });
    }, 1000);
};
