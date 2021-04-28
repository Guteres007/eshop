require("./../bootstrap");
import "@coreui/coreui";
import axios from "axios";
import { productSignal } from "./product-signal";
import { autocomplete } from "./autocomplete";

axios.get("/admin/product-parameters").then((response) => {
    let parameters = response.data;
    autocomplete(document.getElementById("myInput"), parameters);
});

window.productSignal = productSignal;
