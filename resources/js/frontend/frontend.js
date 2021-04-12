require("../bootstrap");
import bootstrap from "bootstrap";

import { getPayments, setPayments } from "./delivery-payment";
window.getPayments = getPayments;
window.setPayments = setPayments;
