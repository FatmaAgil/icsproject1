<x-plasticUserLayout><br><br><br><br><br><br>

    <main id="main">

        <style>
            main{
                font-family: Arial, sans-serif;
                background-color: #ffffff;
                color: #333;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .container {
                text-align: center;
                padding: 20px;
                max-width: 1500px;
                margin: 40px auto;
            }
            h2{
                font-size: 2.5em;
                color: #4CAF50;
                font-weight: bold, italic;

            }

            .plastic-type {
                display: flex;
                justify-content: space-around;
                flex-wrap: wrap;
                gap: 20px;
                margin-top: 20px;
            }
            .plastic{
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(59, 110, 77, 0.809);
                width: 400px;
                transition: transform 0.2s;
            }

             .plastic h3{
                font-size: 1.5em;
                margin-bottom: 10px;
                border-radius: 10px;
                color: #2dc997;
                font-weight: italic;

            }
            .plastic p {
                font-size: 1em;
                line-height: 1.5;
                color: #666;
            }
/* Add this to your existing CSS code */

.plastic {
  transition: transform 0.3s, box-shadow 0.3s; /* Add transition effect */
  transform: perspective(1000px); /* Add perspective to create a 3D effect */
}
.plastic:hover {
  transform: scale(1.1) translateZ(20px); /* Scale up and bring to front on hover */
  box-shadow: 0 0 20px rgba(11, 250, 23, 0.5); /* Add a drop shadow on hover */
  z-index: 1; /* Bring to front on hover */
}






/* Responsive Design */


@media (max-width: 600px) {

.plastic {

  width: 45%;

}

}


@media (max-width: 400px) {

.plastic {

  width: 100%;

}

}


            .btnguide{

         text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 1px;
        display: inline-block;
        padding: 10px 20px;
        border-radius: 20px;
        transition: 0.5s;
        border: 2px solid black;
        color: black;
            }
            .btnguide:hover{
                background-color: #4CAF50;
                color: white;
            }
            .btnrecycle{
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 1px;
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        border-radius: 20px;
        transition: 0.5s;
        border: 2px solid black;
        color: black;
        margin-top: 20px;
          }
          .btnrecycle:hover{
              background-color: #4CAF50;
              color: white;
          }

        </style>



    <div class="container">

        <h2>Guide on plastic recycling</h2>
        <div class="plastic-type">
            <div class="plastic">
                   <div class="PET">
            <h3>Polyethylene Terephthalate (PET)</h3>
            <p>Used for beverage bottles and food containers.</p>
            <button type="menu" <a href="/PET" class="btnrecycle">Recycle</a></button>
            </div>
        </div>
        <div class="plastic">
            <div class="HDPE">
            <h3>High-Density Polyethylene(HDPE)</h3>
            <p>Used for milk jugs, detergent bottles, and some plastic bags.</p>
        <button type="menu" <a href="/HDPE" class="btnrecycle">Recycle</a></button>
            </div>
        </div>
        <div class="plastic">
            <div class="PVC">
            <h3>Polyvinyl Chloride(PVC or Vinyl)</h3>
            <p>Used for plumbing pipes, credit cards, human and pet toys, rain gutters, teething rings, IV fluid bags and medical tubing and oxygen masks.</p>
            <button type="menu" <a href="/PVC" class="btnrecycle">Recycle</a></button>
            </div>
        </div>
        <div class="plastic">
            <div class="LDPE">
            <h3>Low-Density Polyethylene(LDPE)</h3>
            <p>Used for Plastic/cling wrap, sandwich and bread bags, bubble wrap, garbage bags, grocery bags and beverage cups.</p>
            <button type="menu" <a href="/LDPE" class="btnrecycle">Recycle</a></button>
            </div>
        </div>
        <div class="plastic">
            <div class="PP">
            <h3>Polypropylene(PP)</h3>
            <p>Used for  Straws, bottle caps, prescription bottles, hot food containers, packaging tape, disposable diapers and DVD/CD boxes.</p>
            <button type="menu" <a href="/PP" class="btnrecycle">Recycle</a></button>
            </div>
        </div>
        <div class="plastic">
            <div class="PS">
            <h3>Polystyrene(PS or Styrofoam)</h3>
            <p>Used for Cups, takeout food containers, shipping and product packaging, egg cartons, cutlery and building insulation.</p>
            <button type="menu" <a href="/PS" class="btnrecycle">Recycle</a></button>
            </div>
        </div>
        <div class="plastic">
            <div class="others">
            <h3>Others</h3>
            <p>This refers to any plastic that does not belong in the 6 categories</p>
            <button type="menu" <a href="/others" class="btnrecycle">Recycle</a></button>
            </div>
        </div>
        </div>



</main>


</x-plasticUserLayout>
