function displayImg() {
    let thumbnailLink = $('#thumbnail').value;
    if(thumbnailLink) {
        $('#preview-img').src = thumbnailLink;
        return
    }
    $('#preview-img').src = 'https://cdn4.iconfinder.com/data/icons/meBaze-Freebies/512/preview.png';
}


function ajaxProduct(action, id) {
    if(action == 'delete') {
        if(confirmAction() == false) {
            return
        }
        $.ajax({
            url: DOMAIN + '/admin/processProduct/del/id=' + id,
            type: 'POST',
            success: function(data) {
                if(data == 'true') {
                    console.log(true)
                    loadProduct()
                }
                else {
                    
                }
            }
        })
    }
}

function loadProduct() {
    $.ajax({
        url: DOMAIN + '/admin/product/get',
        type: 'POST',
        success: function(data) {
            data = JSON.parse(data)
            let index = 1;
            let html = ''
            for(item of data) {
                html += `<tr>
                    <td class="td-center" style="width:36px;">${index}</td>
                    <td class="width-100px td-normal">
                        <img src="${item["thumbnail"]}" alt="Ảnh" class="width-100px">
                    </td>
                    <td>${item["title"]}</td>
                    <td class="width-150px">${item["category_name"]}</td>
                    <td class="width-150px text-right">${item["price"]} VND</td>
                    <td class="td-shorter text-right">${item["discount"]} %</td>
                    <td class="width-100px text-right">${item["updated_at"]}</td>
                    <td class="td-shorter text-center">
                        <a href="${DOMAIN}/admin/product/edit/id=${item["id"]}">
                            <button type="button" class="btn btn-outline-warning">
                                <i class="fas fa-pen-nib"></i>
                            </button>
                        </a>
                    </td>
                    <td class="td-shorter text-center">
                        <button type="button" class="btn btn-outline-danger" onclick="ajaxProduct('delete', ${item["id"]})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>`
                index++
            }
            $('#list-product').html(html)
        }
    })
}