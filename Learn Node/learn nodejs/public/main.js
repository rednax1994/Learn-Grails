var update = document.getElementById('update')
var del = document.getElementById('delete')

update.addEventListener('click', function () {
    fetch('quotes', {
        method: 'put',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({
            'name': 'Darth Vader',
            'quote': 'I find your lack of faith disturbing.'
        })
    })
        .then(response => {
        if (response.ok) return response.json()
})
    .then(data => {
        console.log(data)
        window.location.reload()
})
})

del.addEventListener('click', function () {
    fetch('quotes', {
        method: 'delete',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            'name': 'Darth Vader'
        })
    }).then(function (response) {
        console.log(response)
        window.location.reload()
    })
})