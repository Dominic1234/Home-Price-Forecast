async function fetchData() {
    try {
        const pokemonName = document.getElementById("pokemonName").value.toLowerCase();
        const response = await fetch(`https://pokeapi.co/api/v2/pokemon/${pokemonName}`);

        if (!response.ok) {
            throw new Error("Could not fetch resource");
        }

        const data = await response.json();
        
        // Extract Pokémon details
        const pokemonSprite = data.sprites.front_default;
        const pokemonHeight = data.height;
        const pokemonWeight = data.weight;
        const pokemonTypes = data.types.map(typeInfo => typeInfo.type.name).join(", ");

        // Get elements
        const imgElement = document.getElementById("pokemonSprite");
        const detailsElement = document.getElementById("pokemonDetails");

        // Update the UI
        imgElement.src = pokemonSprite;
        imgElement.style.display = "block";

        detailsElement.innerHTML = `
            <h2>${data.name.toUpperCase()}</h2>
            <p><strong>Height:</strong> ${pokemonHeight} dm</p>
            <p><strong>Weight:</strong> ${pokemonWeight} hg</p>
            <p><strong>Type(s):</strong> ${pokemonTypes}</p>
        `;

    } catch (error) {
        console.error(error);
    }
}