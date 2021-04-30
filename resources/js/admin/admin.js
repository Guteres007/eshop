require("./../bootstrap");
import "@coreui/coreui";
import { fetchParameters } from "./services/autocompleteservice";
import { productSignal } from "./product-signal";
import { imageResolver } from "./services/images";
import { addParameter } from "./services/add-parameter";

try {
    imageResolver();
} catch (error) {}

fetchParameters();
window.addParameter = addParameter;
window.productSignal = productSignal;
