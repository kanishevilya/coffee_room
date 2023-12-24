async function getJson(url){
    let response=await fetch(url);
    let promise=await response.json();
    return promise;
}

