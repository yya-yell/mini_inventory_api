let edit = document.querySelector('#edit_items');
let DeleteID = [];

edit.addEventListener('click', () => { // edit action main opener
    let edit_btns = document.querySelectorAll('#edit_btns');
    let edit_item = document.querySelectorAll('#edit_item');
    let real_data = document.querySelectorAll('#real_data');
    let edit_form = document.querySelectorAll('#edit_form');
    let cancle_edit = document.querySelectorAll('#cancle_edit');
    let save_edit = document.querySelectorAll('#save_edit');
    let item_wrapper = document.querySelectorAll('#item_wrapper');
    let item_name = document.querySelectorAll('.item_name');
    let price = document.querySelectorAll('.price');
    let order_available = document.querySelectorAll('.order_available')
    let item_name_data = document.querySelectorAll('.item_name_data');
    let price_data = document.querySelectorAll('.price_data');
    let th_checker = document.querySelectorAll('.th_checker');
    let th_qty_input = document.querySelectorAll('.th_qty_input');
    // let ed = edit_btns.length;
    // var i = 0, len = edit_btns.length;
    // while (i < len) {
    //     edit_btns[i].classList.remove('d-none')
    //     i++
    // }
    edit_btns.forEach(element => {
        element.classList.remove('d-none')
    });
    edit_navigator.classList.remove('d-none')
    done.classList.remove('d-none')
    edit.classList.add('d-none')
    tody_history_navigator.classList.add('d-none')
    tody_history_navigator.classList.add('d-none')
    th_checker.forEach(e => e.classList.add('d-none'));
    th_show_select.classList.remove('active')
    th_counter_wrapper.forEach(th => th.classList.add('d-none'))
    edit_counter_wrapper.forEach(ed => ed.classList.remove('d-none'))
    th_qty_input.forEach(e => e.classList.add('d-none'))

    let ToD = document.querySelectorAll('#delete_item');
    ToD.forEach((i) => {
        i.addEventListener('click', () => {
            if (i.classList.contains('active')) {
                DeleteID.pop(i.getAttribute('ToD'))
                i.classList.remove('active')
                counter.innerHTML = DeleteID.length;
            } else {
                DeleteID.push(i.getAttribute('ToD'))
                i.classList.add('active')
                counter.innerHTML = DeleteID.length;
            }
        })
    })

    looper(edit_item, real_data, edit_form)
    looper(cancle_edit, edit_form, real_data)

    //axios edit
    let sub_item_wrapper = document.querySelectorAll('.sub_item_wrapper');
    save_edit.forEach((e, i) => {
        e.addEventListener('click', (e) => {
            e.preventDefault()
            axios.put(`/api/inventory/${item_wrapper[i].getAttribute('forId')}/edit`, {
                'item_name': item_name[i].value,
                'price': price[i].value,
                'order_available': order_available[i].checked
            })
                .then(function (response) {
                    item_name_data[i].innerHTML = response.data.data.item_name;
                    price_data[i].innerHTML = response.data.data.price
                    real_data[i].classList.remove('d-none')
                    edit_form[i].classList.add('d-none')
                    if (order_available[i].checked) {
                        sub_item_wrapper[i].classList.remove('border-info')
                        sub_item_wrapper[i].classList.add('border-success')
                    } else {
                        sub_item_wrapper[i].classList.add('border-info')
                        sub_item_wrapper[i].classList.remove('border-success')
                    }
                })
                .catch(function (error) {
                    console.log(error)
                })
        })
    })
    //axios delete
    confirm_delete.addEventListener('click', () => {
        axios.post('/inventory/delete', {
            'id': DeleteID,
        })
            .then(function (response) {
                item_wrapper.forEach(e => {
                    response.data.ids.forEach(i => {
                        if (e.getAttribute('forId') == i) {
                            e.classList.add('d-none');
                        }
                    })
                });
                getter('newest')
                total_counter.innerHTML = response.data.total
                DeleteID = []
                counter.innerHTML = 0
                total_main.innerHTML = response.data.total
            })
            .catch(function (error) {
                console.log(error.response);
            });
    })
})


done.addEventListener('click', () => {
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
})
delete_cancle.addEventListener('click', () => {
    DeleteID = []
    counter.innerHTML = DeleteID.length
    let ToD = document.querySelectorAll('#delete_item');
    // var i = 0, len = ToD.length;
    // while (i < len) {
    //     console.log(ToD[i])
    //     ToD[i].remove('active')
    //     i++
    // }
    ToD.forEach((i) => {
        i.classList.remove('active')
    })
})



