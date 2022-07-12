// buttons wrapper
let inventories_wrapper = document.querySelector('#inventoreis_wrapper')
// let edit = document.querySelector('#edit_items');
let done = document.querySelector('#Done');
let total_main = document.querySelector('#main_total')
// let edit_btns = document.querySelectorAll('#edit_btns');
let delete_item = document.querySelectorAll('#delete_item');
let edit_item = document.querySelectorAll('#edit_item');
// let ToD = document.querySelectorAll('#delete_item');
let edit_navigator = document.querySelector('#edit-navigator');
let counter = document.querySelector('#counter');
let delete_cancle = document.querySelector('#delete-cancle');
let confirm_delete = document.querySelector('#confirm_delete');
// let item_wrapper = document.querySelectorAll('#item_wrapper');

// let real_data = document.querySelectorAll('#real_data');
// let edit_form = document.querySelectorAll('#edit_form');
let cancle_edit = document.querySelectorAll('#cancle_edit');

let total_counter = document.querySelector('#total_counter');
let save_edit = document.querySelectorAll('#save_edit');
let item_name = document.querySelectorAll('.item_name');
let price = document.querySelectorAll('.price');
let order_available = document.querySelectorAll('.order_available')
let item_name_data = document.querySelectorAll('.item_name_data');
let price_data = document.querySelectorAll('.price_data');


let th_counter_wrapper = document.querySelectorAll('#th_counter_wrapper');
let edit_counter_wrapper = document.querySelectorAll('#edit_counter_wrapper');

// delete_cancle.addEventListener('click', () => {
//     DeleteID = []
//     counter.innerHTML = DeleteID.length
//     ToD.forEach((i) => {
//         i.classList.remove('active')
//     })
// })

// looper(edit_item, real_data, edit_form)
// looper(cancle_edit, edit_form, real_data)

// ToD.forEach((i) => {
//     i.addEventListener('click', () => {
//         if (i.classList.contains('active')) {
//             DeleteID.pop(i.getAttribute('ToD'))
//             i.classList.remove('active')
//             counter.innerHTML = DeleteID.length;
//         } else {
//             DeleteID.push(i.getAttribute('ToD'))
//             i.classList.add('active')
//             counter.innerHTML = DeleteID.length;
//         }
//     })
// })
// helper functions
// function dialog_box_navigator(main_btn, navigator) {
//     main_btn.forEach(element => {
//         element.classList.remove('d-none')
//     });
//     navigator.classList.remove('d-none')
// }
function looper(element, rd, ed) {
    element.forEach((e, ei) => {
        rd.forEach((r, ri) => {
            ed.forEach((f, fi) => {
                e.addEventListener('click', () => {
                    if (ei == ri && ei == fi) {
                        r.classList.add('d-none');
                        f.classList.remove('d-none')
                    }
                })
            })
        })
    })
}
// function done_edit() {
//     edit_btns.forEach(element => {
//         element.classList.add('d-none')
//         real_data.forEach(e => e.classList.remove('d-none'))
//         edit_form.forEach(e => e.classList.add('d-none'))
//     });
//     edit_navigator.classList.add('d-none')
//     done.classList.add('d-none')
//     edit.classList.remove('d-none')
// }
function showContent(el) {
    el.forEach(element => {
        inventories_wrapper.innerHTML += `
                                <div class="col-md-3 col-lg-2 mb-2" id="item_wrapper" forId="${element.id}">
                                 <div class="sub_item_wrapper card text-center p-2 border ${element.order_available ? 'border-success' : 'border-info'}">

                                <div id="edit_form" class="d-none">
                                    <form>
                                        <input type="text" name="item_name" value="${element.item_name}"
                                            class="form-control item_name text-center text-primary form-control-sm">

                                        <input type="text" name="price" value="${element.price}"
                                            class="form-control price text-center form-control-sm my-2">

                                        <input type="checkbox" value="true" class="form-check-sm order_available" 
                                        ${element.order_available ? 'checked' : ''}  name="order_available">  

                                        <small class="text-xs">Check if this can order.</small>
                                        <button type="submit" id="save_edit" class="btn btn-sm btn-outline-success">Save</button>
                                        <button type="button" class="btn btn-sm btn-outline-info" id="cancle_edit">cancle</button>
                                    </form>
                                </div>

                                <div id="real_data">
                                    <a href="" class="item_name_data">${element.item_name}</a>
                                    <p><span class="price_data">${element.price}</span> ~ kyat</p>
                                    <div id="edit_btns" class="d-none">
                                        <button class="btn btn-outline-info btn-sm" id="edit_item">Edit</button>
                                        <button class="btn btn-outline-danger btn-sm" id="delete_item" ToD="${element.id}">Delete</button>
                                    </div>
                                </div>
                                <div  class="rounded" style="">
                                    <input type="checkbox" value="${element.id}" class="d-none th_checker">
                                    <input type="number" name="qty" placeholder="1" disabled min="1" max="5"  class="d-none qty_input border th_qty_input">
                                </div>
                            </div>
                        </div>

        `
    });
}
//end helper functions
// edit.addEventListener('click', () => { // edit action main opener
//     dialog_box_navigator(edit_btns, edit_navigator)
//     done.classList.remove('d-none')
//     edit.classList.add('d-none')
//     tody_history_navigator.classList.add('d-none')
//     tody_history_navigator.classList.add('d-none')
//     th_checker.forEach(e => e.classList.add('d-none'));
//     th_show_select.classList.remove('active')
//     th_counter_wrapper.forEach(th => th.classList.add('d-none'))
//     edit_counter_wrapper.forEach(ed => ed.classList.remove('d-none'))
//     th_qty_input.forEach(e => e.classList.add('d-none'))
// })
// done.addEventListener('click', () => {
//     done_edit()
// })


//////////////////////////////////////////// today history
let tody_history_navigator = document.querySelector('#tody-history-navigator');


let th_show_select = document.querySelector('#th_show_select');
let th_qty_input = document.querySelectorAll('.th_qty_input');
let th_create = document.querySelector('#th_create')
let th_counter = document.querySelectorAll('#th_counter');

let today_history = []
th_show_select.addEventListener('click', () => { //create today history action main opener
    let th_qty_input = document.querySelectorAll('.th_qty_input');
    let th_checker = document.querySelectorAll('.th_checker');
    let edit_btns = document.querySelectorAll('#edit_btns');
    let real_data = document.querySelectorAll('#real_data');
    let edit_form = document.querySelectorAll('#edit_form');
    edit_btns.forEach(e => {
        e.classList.add('d-none')
    });
    real_data.forEach(e => e.classList.remove('d-none'))
    edit_form.forEach(e => e.classList.add('d-none'))
    done.classList.add('d-none')
    edit.classList.remove('d-none')
    th_counter_wrapper.forEach(th => th.classList.remove('d-none'));
    edit_counter_wrapper.forEach(ed => ed.classList.add('d-none'))
    th_checker.forEach((e, i) => {
        if (e.classList.contains('d-none')) {
            e.classList.remove('d-none')
            th_qty_input.forEach(e => e.classList.remove('d-none'))
            tody_history_navigator.classList.remove('d-none')
            // done_edit()
            th_show_select.classList.add('active')

        } else {
            e.classList.add('d-none')
            tody_history_navigator.classList.add('d-none')
            edit_navigator.classList.add('d-none')
            th_show_select.classList.remove('active')
            th_qty_input.forEach(e => e.classList.add('d-none'))

        }

        e.addEventListener('click', () => {
            if (th_qty_input[i].classList.contains('border')) {
                th_qty_input[i].classList.remove('border')
                th_qty_input[i].removeAttribute('disabled');
                today_history.push({ 'id': e.value, 'qty': 1 })
                th_counter.forEach(th => th.innerHTML = today_history.length)
            } else {
                th_qty_input[i].classList.add('border')
                today_history.pop({ 'id': e.value, 'qty': 1 })
                th_qty_input[i].setAttribute('disabled', 'disabled');
                th_qty_input[i].value = 1;
                th_counter.forEach(th => th.innerHTML = today_history.length)
            }
        })
    })
    //axios th create
    th_create.addEventListener('click', () => {
        axios.post('/api/todayHistory/create', {
            'items': today_history
        }).then(function (response) {
            th_checker.forEach(t => t.checked = false);
            th_qty_input.forEach(e => {
                e.setAttribute('disabled', 'disabled');
                e.value = 1;
                e.classList.add('border')
                today_history = []
                th_counter.forEach(th => th.innerHTML = today_history.length)
            })

        }).then(function (error) {
            console.log(error)
        })
    })
})

th_qty_input.forEach((e, i) => {
    e.addEventListener('keydown', (e) => {
        e.preventDefault();
    })
    e.addEventListener('change', () => {
        let element = today_history.find(e => e.id === th_checker[i].value)
        if (element) {
            element.qty = e.value
        }
    })
});


/////////////////////////////// today histor end









/////////////////////////////////////////   axios
let newest = document.querySelector('#newest')
let viaPrice = document.querySelector('#viaPrice')
let viaOldest = document.querySelector('#viaOldest')
let viaOrder = document.querySelector('#viaOrder')
let filter = document.querySelector('#filter')
// let link = undefined ;
newest.addEventListener('click', (e) => {
    e.preventDefault()
    filter.innerHTML = "Newest"
    link = 'newest'
    getter()
})
viaPrice.addEventListener('click', (e) => {
    e.preventDefault()
    filter.innerHTML = "Price"
    link = 'price'
    getter(link)
})
viaOldest.addEventListener('click', (e) => {
    e.preventDefault()
    filter.innerHTML = "Oldest"

    link = 'oldest'
    getter(link)
})
viaOrder.addEventListener('click', (e) => {
    e.preventDefault()
    filter.innerHTML = "Order Available"

    link = 'order_available'
    getter(link)
})
viaNormal.addEventListener('click', (e) => {
    e.preventDefault()
    filter.innerHTML = "Normal Items"

    link = 'normal_items'
    getter(link)
})
function getter(link) {
    axios.get(`/getting_inventories?${link}=${link}`)
        .then(function (response) {
            let edit_btns = document.querySelectorAll('#edit_btns');
            let real_data = document.querySelectorAll('#real_data');
            let edit_form = document.querySelectorAll('#edit_form');
            edit_btns.forEach(element => {
                element.classList.add('d-none')
                real_data.forEach(e => e.classList.remove('d-none'))
                edit_form.forEach(e => e.classList.add('d-none'))
            });
            edit_navigator.classList.add('d-none')
            done.classList.add('d-none')
            edit.classList.remove('d-none')
            tody_history_navigator.classList.add('d-none')
            edit_navigator.classList.add('d-none')
            th_show_select.classList.remove('active')
            th_qty_input.forEach(e => e.classList.add('d-none'))

            inventories_wrapper.innerHTML = ''
            showContent(response.data)
        })
        .catch(function (error) {
            console.log(error)
        })
}

axios.get(`/getting_inventories?newest=newest`)
    .then(function (response) {
        showContent(response.data)
    })
    .catch(function (error) {
        console.log(error)
    })

//  axios delete
// confirm_delete.addEventListener('click', () => {
//     axios.post('/api/inventory/delete', {
//         'id': DeleteID,
//     })
//         .then(function (response) {
//             item_wrapper.forEach(e => {
//                 response.data.ids.forEach(i => {
//                     if (e.getAttribute('forId') == i) {
//                         e.classList.add('d-none');
//                     }
//                 })
//             });
//             total_counter.innerHTML = response.data.total
//             DeleteID = []
//             counter.innerHTML = 0
//             total_main.innerHTML = response.data.total
//         })
//         .catch(function (error) {
//             console.log(error.response);
//         });
// })

//edit
// let sub_item_wrapper = document.querySelectorAll('.sub_item_wrapper');
// save_edit.forEach((e, i) => {
//     e.addEventListener('click', (e) => {
//         e.preventDefault()
//         axios.put(`/api/inventory/${item_wrapper[i].getAttribute('forId')}/edit`, {
//             'item_name': item_name[i].value,
//             'price': price[i].value,
//             'order_available': order_available[i].checked
//         })
//             .then(function (response) {
//                 item_name_data[i].innerHTML = response.data.data.item_name;
//                 price_data[i].innerHTML = response.data.data.price
//                 real_data[i].classList.remove('d-none')
//                 edit_form[i].classList.add('d-none')
//                 if (order_available[i].checked) {
//                     sub_item_wrapper[i].classList.remove('border-info')
//                     sub_item_wrapper[i].classList.add('border-success')
//                 } else {
//                     sub_item_wrapper[i].classList.add('border-info')
//                     sub_item_wrapper[i].classList.remove('border-success')
//                 }
//             })
//             .catch(function (error) {
//                 console.log(error)
//             })
//     })
// })


//today history create
// th_create.addEventListener('click', () => {
//     axios.post('/api/todayHistory/create', {
//         'items': today_history
//     }).then(function (response) {
//         th_checker.forEach(t => t.checked = false);
//         th_qty_input.forEach(e => {
//             e.setAttribute('disabled', 'disabled');
//             e.value = 1;
//             e.classList.add('border')
//             today_history = []
//             th_counter.forEach(th => th.innerHTML = today_history.length)
//         })

//     }).then(function (error) {
//         console.log(error)
//     })
// })

// axios end


