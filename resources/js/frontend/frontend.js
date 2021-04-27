require("../bootstrap");
import { changeProductQuantity } from "./change-product-quantity";
import { getPayments } from "./delivery-payment";

import { productFiltering } from "./product-filtering";
window.productFiltering = productFiltering;
window.getPayments = getPayments;
window.changeProductQuantity = changeProductQuantity;
