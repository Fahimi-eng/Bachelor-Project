//ajax table
async function checkDate(e){
    const dateInput = document.querySelector('#date');
    const table = document.querySelector("#table");
    let time='';
    let class_name = '';
    let dd = document.getElementById('lunch-time').classList;
    dd.forEach((item)=>{
        class_name = item;
    })
    if(class_name == '')
    {
        time = document.querySelector('#time1').selectedOptions[0].value;
    }
    else {
        time = document.querySelector('#time2').selectedOptions[0].value;
    }
    let date = dateInput.value;
    console.log('start check date ajax');
    let free_table = await $.ajax({
        url:'http://127.0.0.1:8000/ajax/order/checkDate',
        type:'GET',
        dataType: 'json',
        data:{
            _token: '{{ csrf_token() }}',
            date: date,
            time: time
        },
        success:function (data){
            console.log('Success check date ajax' , data);
        }
    });
    console.log('End check date ajax');
    free_table = free_table['tables'];
    table.innerHTML = "";
    free_table.forEach((data)=>{
        table.innerHTML += `
                            <option value="${data.id}"><span>${data.name}</span>-<span>${data.capacity}</span> نفره </option>
                        `;
    });
    table.parentElement.classList.remove("d-none");
}

//select meal
lunchTime = document.getElementById("lunch-time")
dinnerTime = document.getElementById("dinner-time")
selectBox = document.getElementById("selectbox")
selectBox.addEventListener("change",function(e){
    if(this.value == "dinner"){
        lunchTime.classList.add("d-none")
        dinnerTime.classList.remove("d-none")
    }
    if(this.value == "lunch"){
        dinnerTime.classList.add("d-none")
        lunchTime.classList.remove("d-none")
    }
})

//food perosn
function selectePerson(selected){
    $.ajax({
        url: 'http://127.0.0.1:8000/ajax/get/food',
        type: 'GET',
        dataType: 'json',
        success: function(data){
            let select = `<select name="foods[]" id="" class="form-select form-control" aria-label="Default select example">`;
            data.forEach((item) => {
                select += `<option value='${item.id}'>${item.name}</option>`;
            })
            select += `</select>`;
            const foodPerson = document.querySelector('#foodPerson');
            let foods = ``;
            for(let i=0; i < selected.value; i++){
                foods += `<div class="mt-3 mt-md-4 mx-md-2">
                        <label for="" class="text-dark">انتخاب غذای فرد <span> ${1+i} </span></label>` +
                    select +
                    `</div>`;
            }
            foodPerson.innerHTML = foods;
        }
    })
}
