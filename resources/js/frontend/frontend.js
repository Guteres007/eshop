require("../bootstrap");
import { changeProductQuantity } from "./change-product-quantity";
import { getPayments } from "./delivery-payment";
window.getPayments = getPayments;
window.changeProductQuantity = changeProductQuantity;
