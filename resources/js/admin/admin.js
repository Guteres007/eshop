require("./../bootstrap");
import "@coreui/coreui";
import { fetchParameters } from "./services/autocompleteservice";
import { productSignal } from "./product-signal";
import { imageResolver } from "./services/images";
import { addParameter } from "./services/add-parameter";

imageResolver();
fetchParameters();
window.addParameter = addParameter;
window.productSignal = productSignal;
