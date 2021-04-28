require("./../bootstrap");
import "@coreui/coreui";
import { fetchParameters } from "./services/autocompleteservice";
import { productSignal } from "./product-signal";

fetchParameters();
window.productSignal = productSignal;
