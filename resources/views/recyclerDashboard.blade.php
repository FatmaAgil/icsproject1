<x-RecycleLayout><br><br>

    <main id="main">

        <style>
            main{
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
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
                max-width: 1000px;
                margin: auto;
            }
            h1 {
                font-size: 2.5em;
                color: #333;
                font-weight: bold;

            }
            h5 {
                font-size: 1.5em;
                color: #333;
                font-weight: italic
            }
            .services {
                display: flex;
                justify-content: space-around;
                flex-wrap: wrap;
                gap: 20px;
                margin-top: 20px;
            }
            .service {
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(59, 110, 77, 0.809);
                width: 200px;
                transition: transform 0.2s;
            }
            .service:hover {
                background-color: #f3e5f5;
                transform: scale(1.05);
            }
            .service h2 {
                font-size: 1.5em;
                margin-bottom: 10px;

            }
            .service p {
                font-size: 1em;
                line-height: 1.5;
                color: #666;
            }
            .service .bi {
            font-size: 2em;
            color: #4CAF50;
            vertical-align: right;
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
          .btncommunity{
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 1px;
        display: inline-block;
        padding: 10px 20px;
        border-radius: 20px;
        transition: 0.5s;
        border: 2px solid black;
        color: black;
        margin-top: 20px;
          }
          .btncommunity:hover{
              background-color: #4CAF50;
              color: white;
          }
        </style>

    <body>

    <div class="container">
        <h1>Welcome to RecycleConnect</h1>
        <h5>Help us in making recycling plastic easier.</h5><br><br>
        <div class="services">
            <div class="service" ">
                <h2>Connections</h2><i class="bi bi-book"></i>
                <p>View details of the different plastic users connected to you</p>
                <button type="button" class="btnguide"><a href="/guide">Learn more</a></button>
            </div>
            <div class="service" >
                <h2>Recycle</h2>
                <i class="bi bi-geo-fill"></i>
                <p>Register your organization.</p>
                <button type="button" class="btnrecycle"><a href="{{ route('register.organization') }}">Recycle</a></button>
            </div>
            <div class="service" >
                <h2>Community</h2>
                <i class="bi bi-people-fill"></i>
                <p>Join the community and explore the plastic adventure.</p>
                <button type="button" class="btncommunity"><a href="{{route('community.index')}}">Community</a></button>
            </div>

        </div>
    </div>



</main>


</x-RecycleLayout>
