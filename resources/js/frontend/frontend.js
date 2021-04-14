require("../bootstrap");
import { changeProductQuantity } from "./change-product-quantity";
import { getPayments, setPayments } from "./delivery-payment";
window.getPayments = getPayments;
window.setPayments = setPayments;
window.changeProductQuantity = changeProductQuantity;
