const url = "http://localhost/project/backend/index.php";

let total = 0;

function adicionar() {
    const produto = document.getElementById("produto").value;
    const qtd = parseInt(document.getElementById("qtd").value);

    if (!qtd || qtd <= 0) return;

    let preco = 0;

    if (produto === "pastel") preco = 10;
    if (produto === "caldo") preco = 8;
    if (produto === "refrigerante") preco = 5;
    if (produto === "suco") preco = 6;

    const subtotal = preco * qtd;
    total += subtotal;

    document.getElementById("total").textContent = total;

    const lista = document.getElementById("lista");

    const item = document.createElement("li");
    item.textContent = `${produto} - Qtd: ${qtd} - R$ ${subtotal}`;

    lista.appendChild(item);

    document.getElementById("qtd").value = "";
}

function enviarPedido() {
    const itens = document.querySelectorAll("#lista li");

    if (itens.length === 0) {
        mostrarMensagem("Adicione itens antes de finalizar", "red");
        return;
    }

    let pedidos = [];

    itens.forEach(item => {
        pedidos.push(item.textContent);
    });

    const mensagem = `Pedido:%0A${pedidos.join("%0A")}%0ATotal: R$ ${total}`;

    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            cliente: "Cliente",
            produto: pedidos.join(", "),
            quantidade: total
        })
    })
    .then(() => {
        window.open(`https://api.whatsapp.com/send?text=${mensagem}`, "_blank");

        mostrarMensagem("Pedido enviado com sucesso!", "green");

        document.getElementById("lista").innerHTML = "";
        document.getElementById("total").textContent = "0";
        total = 0;
    })
    .catch(() => {
        window.open(`https://api.whatsapp.com/send?text=${mensagem}`, "_blank");

        mostrarMensagem("Pedido enviado com sucesso!", "green");
    });
}

function mostrarMensagem(texto, cor) {
    const msg = document.createElement("div");
    msg.textContent = texto;

    msg.style.position = "fixed";
    msg.style.top = "20px";
    msg.style.right = "20px";
    msg.style.background = cor;
    msg.style.color = "white";
    msg.style.padding = "10px 15px";
    msg.style.borderRadius = "5px";
    msg.style.zIndex = "9999";

    document.body.appendChild(msg);

    setTimeout(() => {
        msg.remove();
    }, 2500);
}