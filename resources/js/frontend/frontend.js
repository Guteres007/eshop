require("../bootstrap");
import { changeProductQuantity } from "./change-product-quantity";
import { getPayments } from "./delivery-payment";

import {
    productFiltering,
    productFilteringReset,
    productOrderBy,
} from "./product-filtering";
window.productFiltering = productFiltering;
window.productOrderBy = productOrderBy;
window.productFilteringReset = productFilteringReset;
window.getPayments = getPayments;
window.changeProductQuantity = changeProductQuantity;
