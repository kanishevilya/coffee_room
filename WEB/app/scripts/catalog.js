let productsBlock=document.querySelector("#productsBlock");



window.onload=(e)=>{
    let path = `/ilya/EXAM/MVC/store/getAllBaseProducts`;

    getJson(path).then(resp => {
        console.log(resp);
        resp.forEach(product => {
            let block = document.createElement("div");
            block.classList.add("product");
            let img=document.createElement("div");
            img.classList.add("img");
            img.setAttribute("style",`background-image: url(${product.product_image});`)


            let name=document.createElement("p");
            name.textContent=product.product_name;
            name.classList.add("productTitle");
            
            let lowerBlock=document.createElement("div");
            lowerBlock.classList.add("lowerBlock");

            let price=document.createElement("p");
            price.textContent=product.price+"$";
            price.classList.add("productPrice");

            let add=document.createElement("div");
            add.textContent="+";
            add.classList.add("addBlock");

            lowerBlock.append(price, add);
            block.append(img, name, lowerBlock);
            productsBlock.append(block);
        });
    });

}
    