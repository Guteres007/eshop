require("./../bootstrap");
import "@coreui/coreui";
import { fetchParameters } from "./services/autocompleteservice";
import { productSignal } from "./product-signal";
import axios from "axios";
import Dropzone from "dropzone";

// Make sure Dropzone doesn't try to attach itself to the
// element automatically.
// This behaviour will change in future versions.
Dropzone.autoDiscover = false;

let myDropzone = new Dropzone("#image_uploader", {
    previewTemplate: `


  <div id="template" class="file-row" style="max-width: 200px;">
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

      <button data-dz-remove class="btn btn-danger delete">
        <i class="glyphicon glyphicon-trash"></i>
        <span>Delete</span>
      </button>
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
    console.log(`File added: ${file.name}`);
});

myDropzone.on("success", function (file, serverFileName) {
    console.log(file, serverFileName);
});

fetchParameters();
window.productSignal = productSignal;
