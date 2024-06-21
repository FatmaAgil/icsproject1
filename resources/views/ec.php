
<x-plasticUserLayout><br><br><br><br><br>
    <main id="main">
        <style>

main {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.search_bar {
    display: flex;
    align-items: center;
    background-color: white;
    border: 2px solid #2dc997;
    border-radius: 25px;
    padding: 5px 10px;
}

.search_bar i {
    color: #2dc997;
    margin-right: 10px;
    font-size: 1.2em;
}

.search_bar input[type="text"] {
    border: none;
    outline: none;
    padding: 10px;
    border-radius: 25px;
    flex-grow: 1;
    font-size: 1em;
}

.search_bar button {
    background-color: #2dc997;
    color: white;
    border: none;
    border-radius: 25px;
    padding: 10px 20px;
    font-size: 1em;
    cursor: pointer;
    margin-left: 10px;
}

.search_bar button:hover {
    background-color: #2dc930;
}



section {
    background-color: white;
    margin: 1em 0;
    padding: 1em;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


section h2 {
    margin-top: 0;
    color: #2dc997;
    align-text: center;
    text-transform: UpperCase;
}
.identify-plastics {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
}

.plastic-type {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(59, 110, 77, 0.809);
    width: 200px;
    transition: transform 0.2s;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.plastic-type h3 {
    font-size: 1.5em;
    margin-bottom: 10px;
}

.plastic-type p {
    font-size: 1em;
    line-height: 1.5;
    color: #666;
}

.plastic-type .bi {
    font-size: 2em;
    color: #4CAF50;
}

.plastic-type:hover {
    background-color: #f3e5f5;
    transform: scale(1.05);
}

footer {
    background-color: #2dc997;
    color: white;
    text-align: center;
    padding: 1em 0;
    position: fixed;
    width: 100%;
    bottom: 0;
}

            </style>
                    <div class="search_bar">
                        <i class="bi bi-search"></i>
            <input type="text" id="search" placeholder="Search for plastic" id="search input">
            <button type="button" id="search_button">Search</button>
            </div>



        <section id="identifying-plastics">


        </section>
        <section id="preparation">
            <h2>Preparing Plastics for Disposal</h2>
            <p>How to clean, sort, and prepare plastics for recycling.</p>
        </section>
        <section id="disposal-methods">
            <h2>Disposal Methods</h2>
            <p>Information on recycling, reusing, and special disposal methods for plastics.</p>
        </section>
        <section id="reducing-plastic-use">
            <h2>Reducing Plastic Use</h2>
            <p>Tips and tricks for reducing your plastic consumption and finding alternatives.</p><br><br>
        </section>


    </main>




</x-plasticUserLayout>
