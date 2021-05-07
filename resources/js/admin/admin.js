require("./../bootstrap");
import "@coreui/coreui";
import { fetchParameters } from "./services/autocompleteservice";
import { productSignal } from "./product-signal";
import { imageResolver } from "./services/images";
import { addParameter } from "./services/add-parameter";
import { removeParameter } from "./services/remove-parameter";

window.addEventListener("DOMContentLoaded", () => {
    imageResolver();
    fetchParameters();
    window.removeParameter = removeParameter;
    window.addParameter = addParameter;
    window.productSignal = productSignal;
});
