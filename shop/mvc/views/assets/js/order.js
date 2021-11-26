function ajaxOrder(action, id) {
    let value = -1
    if(action == 'accept') {
        value = 2
    }
    else if(action == 'reject') {
        value = 0
    }
    else if(action == 'delete') {
        if(confirmAction() == false) return
    }
    $.ajax({
        url: DOMAIN + '/admin/processOrder/id=' + id,
        type: 'POST',
        data: {value: value},
        success: function(data) {
            loadOrder();
        }
    })
}


function loadOrder() {
    $.ajax({
        url: DOMAIN + '/admin/order/get',
        type: 'POST',
        success: function(data) {
            data = JSON.parse(data);
            let html = ``
            let index = 1
            for(item of data) {
                html += `<tr id="tr-${index}">
                <td class="width-50px td-center">${index}</td>
                <td class="width-200px" id="item-${index}">${item["user_email"]}</td>
                <td class="width-100px">${item["phone_number"]}</td>
                <td class="width-200px">${item["address"]}</td>
                <td class="td-shorter td-center">${item["id"]}</td>
                <td class="width-100px td-right">${item["order_date"]}</td>
                <td class="td-right">${item["total_money"]}</td>
                <td class="width-100px text-center" id="btn-edit-${index}">`
                if(item["status"] == 0) {
                    html += `<div class="color-white bg-error btn-radius" onclick="ajaxOrder('accept' , ${item["id"]})">
                        Đã hủy
                    </div>
                </td>`
                html += `<td class="width-100px text-center" id="btn-edit-${index}">
                        <div class="color-white bg-error btn-radius" onclick="ajaxOrder('delete' , ${item["id"]})">
                            Xóa đơn
                        </div>
                    </td>
                </tr>`
                }
                else if(item["status"] == 1) {
                    html += `<div class="color-white bg-yellow btn-radius" onclick="ajaxOrder('accept' , ${item["id"]})">
                            Chờ duyệt
                        </div>
                    </td>`
                    html += `<td class="width-100px text-center" id="btn-edit-${index}">
                        <div class="color-white bg-yellow btn-radius" onclick="ajaxOrder('reject' , ${item["id"]})">
                            Hủy đơn
                        </div>
                    </td>
                </tr>`
                }
                else if(item["status"] == 2) {
                    html += `<div class="color-white bg-green btn-radius">
                            Đã duyệt
                        </div>
                    </td>`
                    html += `<td class="width-100px text-center" id="btn-edit-${index}">
                        <div class="color-white bg-yellow btn-radius" onclick="ajaxOrder('reject' , ${item["id"]})">
                            Hủy đơn
                        </div>
                    </td>
                </tr>`
                }
                index++
            }
            $('#list-order').html(html)
        }
    })
}