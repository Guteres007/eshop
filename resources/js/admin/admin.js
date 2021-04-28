require("./../bootstrap");
import "@coreui/coreui";
import axios from "axios";
import { productSignal } from "./product-signal";
import { autocomplete } from "./autocomplete";

axios.get("/admin/product-parameters-name").then((response) => {
    let parameters = response.data;
    autocomplete(document.getElementById("parameters_name"), parameters);
});

axios.get("/admin/product-parameters-value").then((response) => {
    let parameters = response.data;
    autocomplete(document.getElementById("parameters_value"), parameters);
});

window.productSignal = productSignal;
