async function getJson(url){
    let response=await fetch(url);
    let promise=await response.json();
    return promise;
}

async function sendData(url, method="get", data){
    let response=await fetch(url, 
        {
            method: method,
            body: JSON.stringify(data),
            headers: {
                "Content-type":"application/json; charset=utf-8"
            }
        }
    );
    let promise=await response.json();
    return promise;
}