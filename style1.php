
        body{
            font-family: Arial;
            background:#f4f4f4;
            margin:0;
        }

        .header{
            background:#333;
            color:white;
            padding:15px;
            display:flex;
            justify-content:space-between;
        }

        .products{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:20px;
            padding:20px;
        }

        .card{
            background:white;
            padding:15px;
            border-radius:10px;
            box-shadow:0 0 5px #ccc;
            text-align:center;
        }

        .card img{
            width:200px;
            height:200px;
        }

        .btn {
            display:inline-block;
            margin-top:10px;
            padding:10px;
            background:#ff9f00;
            color:white;
            text-decoration:none;
            border-radius:5px;
        }

        .btn:hover{
            background:#fb8c00;
        }
   
