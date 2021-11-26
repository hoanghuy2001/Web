function ajaxSeenFeedback(id, value) {
    value = value == 1 ? 0 : 1;
    $.ajax({
        url: DOMAIN + "/admin/processFeedback/seen/id=" + id,
        type: "POST",
        data: {value: value},
        success: function(data) {
            console.log(data)
            if(data == 'true') {
                loadFeedback();
            }
            else {
            
            }
        }
    })
}

function ajaxMarkingFeedback(id, value) {
    value = value == 1 ? 0 : 1;
    $.ajax({
        url: DOMAIN + "/admin/processFeedback/marked/id=" + id,
        type: "POST",
        data: {value: value},
        success: function(data) {
            console.log(data)
            if(data == 'true') {
                loadFeedback();
            }
            else {
            
            }
        }
    })

}

function loadFeedback() {
    $.ajax({
        url: DOMAIN + "/admin/feedback/get",
        type: "POST",
        success: function(list) {
            let listData = JSON.parse(list)
            console.log(listData)
            let html = ``
            let index = 1
            for(item in listData) {
                if(listData[item]["is_seen"] == 1) {
                    html += `<tr id="tr-${item}">
                        <td class="td-shorter td-center">${index}</td>
                        <td id="item-${item}">${listData[item]["user_name"]}</td>
                        <td class="td-normal">${listData[item]["subject"]}</td>
                        <td class="width-400px">${listData[item]["content"]}</td>
                        <td class="width-100px td-right">${listData[item]["updated_at"]}</td>
                        <td class="width-100px text-center" id="btn-edit-${item}">
                            <div class="color-white bg-green btn-radius" onclick="ajaxSeenFeedback(${listData[item]["id"]}, ${listData[item]["is_seen"]})">
                                Đã xem
                            </div>
                        </td>`
                    if(listData[item]["marked"] == 1) {
                        html += `<td class="td-shorter text-center">
                            <div class="btn-radius btn-yellow" onclick="ajaxMarkingFeedback(${listData[item]["id"]}, ${listData[item]["marked"]})">
                                <i class="fas fa-star"></i>
                            </div>
                        </td>
                    </tr>`
                    }
                    else if(listData[item]["marked"] == 0) {
                        html += `<td class="td-shorter text-center">
                            <div class="btn-radius btn-yellow" onclick="ajaxMarkingFeedback(${listData[item]["id"]}, ${listData[item]["marked"]})">
                                <i class="far fa-star"></i>
                            </div>
                        </td>
                    </tr>`
                    }
                }
                else if(listData[item]["is_seen"] == 0) {
                    html += `<tr class="bg-gray" id="tr-${item}">
                        <td class="td-shorter td-center">${index}</td>
                        <td id="item-${item}">${listData[item]["user_name"]}</td>
                        <td class="td-normal">${listData[item]["subject"]}</td>
                        <td class="width-400px">${listData[item]["content"]}</td>
                        <td class="width-100px td-right">${listData[item]["updated_at"]}</td>
                        <td class="width-100px text-center" id="btn-edit-${item}">
                            <div class="color-white btn-radius bg-error" onclick="ajaxSeenFeedback(${listData[item]["id"]}, ${listData[item]["is_seen"]})">
                                Chưa xem
                            </div>
                        </td>`
                    if(listData[item]["marked"] == 1) {
                        html += `<td class="td-shorter text-center">
                            <div class="btn-radius btn-yellow" onclick="ajaxMarkingFeedback(${listData[item]["id"]}, ${listData[item]["marked"]})">
                                <i class="fas fa-star"></i>
                            </div>
                        </td>
                    </tr>`
                    }
                    else if(listData[item]["marked"] == 0) {
                        html += `<td class="td-shorter text-center">
                            <div class="btn-radius btn-yellow" onclick="ajaxMarkingFeedback(${listData[item]["id"]}, ${listData[item]["marked"]})">
                                <i class="far fa-star"></i>
                            </div>
                        </td>
                    </tr>`
                    }
                }
                index++

            }
            document.querySelector('#list-feedback').innerHTML = html
        }
    })

}