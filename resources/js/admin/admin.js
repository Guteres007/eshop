require("./../bootstrap");
import "@coreui/coreui";
import { fetchParameters } from "./services/autocompleteservice";
import { productSignal } from "./product-signal";
import { imageResolver } from "./services/images";
import { addParameter } from "./services/add-parameter";
import { removeParameter } from "./services/remove-parameter";
import {change} from './services/order-status';

window.change = change;

window.addEventListener("DOMContentLoaded", () => {
  try {
    imageResolver();

  } catch (error) {

  }

  try {
    fetchParameters();

  } catch (error) {

  }
  try {
    window.removeParameter = removeParameter;

  } catch (error) {

  }

  try {
    window.addParameter = addParameter;
  } catch (error) {

  }
  try {
    window.productSignal = productSignal;
  } catch (error) {

  }

});
