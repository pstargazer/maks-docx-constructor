
let records = document.querySelectorAll('.clickable')
let url = new URL(window.location.href);
// url.searchParams.set('record_id', 123);


function viewRecord(url, id){
    url.searchParams.set('record_id', id);
    window.location.replace(url)  
}


// 
let editBtns = document.querySelectorAll('.edit_btns');
let trashBtns = document.querySelectorAll('.trash_btns');

editBtns.forEach(el => {
    el.addEventListener('click', evt => {
        let id = evt.target.closest('[data-id]').getAttribute("data-id")
        if (id) {
            console.log(id);
            window.location.href = "/clients/edit/" + id
        } else {
            console.log("No data-id");
        }
    })
})

trashBtns.forEach(el => {
    el.addEventListener('click', evt => {
        let id = evt.target.closest('[data-id]').getAttribute("data-id")

        if (id) {
            console.log(id);
            window.location.href = "/clients/delete/" + id
        } else {
            console.log("No data-id");
        }
    })
})



records.forEach(el => {
    el.addEventListener('click',evt => {
        let id = evt.target.parentNode.getAttribute('data-id')
        // console.log(id)
        viewRecord(url, id)
    })
})