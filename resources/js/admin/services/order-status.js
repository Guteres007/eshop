import axios from "axios"
import Toastify from 'toastify-js'
export const change = (ctx, id) => {
    let status_id = ctx.value;
    axios.get(`/admin/order/${id}/status/${status_id}`).then( response => {

        if (response.data) {
            Toastify({
                text: "Status změněn",
                duration: 3000,
                newWindow: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                backgroundColor: "green",
                stopOnFocus: true, // Prevents dismissing of toast on hover
                onClick: function(){} // Callback after click
              }).showToast();
        } else {
            Toastify({
                text: "Status nezměněn",
                duration: 3000,
                newWindow: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                backgroundColor: "red",
                stopOnFocus: true, // Prevents dismissing of toast on hover
                onClick: function(){} // Callback after click
              }).showToast();
        }



    });


}
