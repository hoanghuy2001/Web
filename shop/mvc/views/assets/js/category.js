function editCategory(index, id, name) {
    let itemIdx = document.getElementById(`item-${index}`)
    let btnEdit = document.getElementById(`btn-edit-${index}`)

    let html = `<div class="input-group margin-0">
        <div class="wide-full">
            <input type="text" class="form-control non-outline" id="edit-cate" name="edit-cate" value="${name}">
            <button class="btn btn-outline-success" type="button" id="btn-check" onclick="ajaxCategory('edit', ${id})">
                <i class="fas fa-check"></i>
            </button>
        </div>
    </div>`
    itemIdx.innerHTML = html

    html = `<button onclick="closeEdit(${index}, ${id}, '${name}')" class="btn btn-outline-danger">
            <i class="fas fa-times"></i>
        </button>`
    btnEdit.innerHTML = html
}

function closeEdit(index, id, name) {
    let itemIdx = document.getElementById(`item-${index}`)
    let btnEdit = document.getElementById(`btn-edit-${index}`)

    let html = `${name}`
    itemIdx.innerHTML = html

    html = `<button onclick="editCategory(${index}, ${id}, '${name}')" class="btn btn-outline-warning">
            <i class="fas fa-pen-nib"></i>
        </button>`
    btnEdit.innerHTML = html
}


function ajaxCategory(action, id = -1) {
    if(action === 'add') {
        let name = $('#category-name').val()
        if(name === '') {
            return
        }
        $.ajax({
            url: DOMAIN + "/admin/processCategory/add",
            type: 'POST',
            data: {name: name},
            success: function(data) {
                if(data == 'true') {
                    $('#category-name').val('');
                    loadCategory()
                }
                else {
                    alert('Danh mục đã tồn tại!')
                }
            }
        })
    }
    else if(action === 'edit') {
        let name = $('#edit-cate').val()
        if(name === '') {
            return
        }
        $.ajax({
            url: DOMAIN + "/admin/processCategory/edit/id=" + id,
            type: 'POST',
            data: {name: name},
            success: function(data) {
                console.log(data)
                if(data == 'true') {
                    loadCategory()
                }
                else {
                    alert('Có tên này gòi cha nội!')
                }
            }
        })
    }
    else if(action === 'delete') {
        let cf = confirmAction()
        if(cf == false) {
            return
        }    
        $.ajax({
            url: DOMAIN + "/admin/processCategory/del/id=" + id,
            type: 'POST',
            success: function(data) {
                if(data == 'true') {
                    loadCategory()
                }
                else {
                    alert('Xóa thất bại!')
                }
            }
        })
    }
}

function loadCategory() {
    $.ajax({
        url: DOMAIN + '/admin/category/get',
        type: 'POST',
        success: function(data) {
            data = JSON.parse(data)
            let index = 1
            let html = ''
            for(item of data) {
                html += `<tr>
                    <td class="td-shorter td-center">${index}</td>
                    <td id="item-${index}">${item["name"]}</td>
                    <td class="td-shorter text-center" id="btn-edit-${index}">
                        <button onclick="editCategory(${index}, ${item["id"]}, '${item["name"]}')" class="btn btn-outline-warning">
                            <i class="fas fa-pen-nib"></i>
                        </button>
                    </td>
                    <td class="td-shorter text-center">
                        <button type="button" class="btn btn-outline-danger" onclick="ajaxCategory('delete', ${item["id"]})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>`
                index++
            }
            document.querySelector('#list-category').innerHTML = html
        }
    })
}