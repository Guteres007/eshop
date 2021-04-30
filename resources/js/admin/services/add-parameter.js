import { fetchParameters } from "./autocompleteservice";

let container = document.querySelector("#parameters-container");
const html = `

    <div class="col-5 mt-3">

        <input form="product_form" class="parameters_name form-control"
            type="text" name="parameters[name][]"
            placeholder="Parametr název">
    </div>
    <div class="col-5 mt-3">

        <input form="product_form"
            class="parameters_value form-control" type="text" name="parameters[value][]"
            placeholder="Parametr hodnota">
    </div>

    <div class="col-2">


    </div>


`;

export const addParameter = () => {
    let row = document.createElement("div");
    console.log(row);
    row.classList.add("row");
    row.innerHTML = html;
    container.appendChild(row);
    setTimeout(() => {
        fetchParameters();
    }, 200);
};
