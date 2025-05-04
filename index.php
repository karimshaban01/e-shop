<?php 
    include 'include/conn.php'; 
    include'include/session.php';
    include'include/systemCheck.php';
    include'include/userCheck.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./assets/css/index.css">
    <link rel="shortcut icon" type="text/css" href="./assets/img/logo.jpeg">
    <link rel="stylesheet" type="text/css" href="./assets/bootstrap/bootstrap-icons.css">
    <title><?php echo $_GET['pagename']?></title>
    <style>
        :root {
            --primary-color: #2196f3;
            --secondary-color: #e3f2fd;
            --accent-color: #42a5f5;
            --text-color: #1e3a8a;
            --light-blue: #bbdefb;
            --hover-blue: #1976d2;
            --shadow-color: rgba(33, 150, 243, 0.1);
        }
        
        body {
            background-color: var(--secondary-color);
            color: var(--text-color);
            font-family: 'Segoe UI', system-ui, sans-serif;
        }
        
        .firstHeader {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            padding: 15px;
            box-shadow: 0 2px 15px var(--shadow-color);
        }
        
        .secondHeader {
            background: white;
            padding: 20px;
            margin: 15px auto;
            border-radius: 16px;
            box-shadow: 0 4px 20px var(--shadow-color);
            max-width: 1200px;
        }
        
        .nameCompany {
            color: var(--primary-color);
            font-size: 1.5em;
        }
        
        .companyTable {
            color: var(--text-color);
        }
        
        input[type="text"] {
            padding: 14px 24px;
            border: 2px solid var(--light-blue);
            border-radius: 12px;
            width: 320px;
            transition: all 0.3s ease;
        }
        
        input[type="text"]:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 4px var(--shadow-color);
        }
        
        input[type="submit"] {
            padding: 12px 25px;
            background: var(--accent-color);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        input[type="submit"]:hover {
            background: var(--hover-blue);
            transform: translateY(-1px);
        }
        
        .cart-Count a {
            text-decoration: none;
            color: var(--text-color);
        }
        
        .cart-Count span {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            padding: 12px 20px;
            border-radius: 50px;
            color: white;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: transform 0.2s ease;
        }
        
        .cart-Count span:hover {
            transform: translateY(-2px);
        }
        
        .categoryDiv {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 20px var(--shadow-color);
        }
        
        .categoryTitle {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 16px;
            border-radius: 12px;
            margin-bottom: 15px;
            font-weight: 600;
        }
        
        .categoryList {
            padding: 10px;
            border-bottom: 1px solid #eee;
            transition: background 0.3s;
        }
        
        .categoryList:hover {
            background: var(--secondary-color);
        }
        
        .menuLinkList a {
            text-decoration: none;
            color: var(--text-color);
        }
        
        .listLink {
            background: white;
            padding: 15px;
            margin: 5px 0;
            border-radius: 6px;
            transition: transform 0.2s;
        }
        
        .listLink:hover {
            transform: translateX(5px);
            background: var(--secondary-color);
        }
        
        .footerDivLink {
            background: white;
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 5px var(--shadow-color);
        }
    </style>
</head>
<body>
    <div class="optionLink" id="optionLink"><?php include 'include/link.php';?></div>
    <div class="firstHeader">
        <table width="100%">
            <tr>
                <td><center><strong class="nameCompany"><label class="companyTable">Welcome</label> E-CART Shop Online</strong></center></td>
                <td class="companyTable"><center>Mwanza-Nyasaka center, Magessa Mall | <a href="tel:+255743084795">+255 743 084 795</a>/<a href="tel:+255625368361">+255 625 368 361</a></center></td>
                <td class="companyTable">
                    <a href="?page=profile&pagename=Profile"><label><i class="bi bi-person"></i> <?php echo $username; ?></label></a>
                    &nbsp;<a href="pages/logout.php"><i class="bi bi-power"></i></a>
                </td>
            </tr>
        </table>
    </div>
    <div class="secondHeader">
        <center>
            <table class="x-table">
                <tr>
                    <td>
                        <form method="POST">
                            <input type="text" name="search" placeholder="Search Here.." required>
                        <a href="?page=cart&pagename=<?php  echo $username;?> | Cart">
                            <span><i class="bi bi-cart"></i><label id="countCart"><center> <?php echo $cart;?> </center></label></span>
                        </a>
                    </td>
                </tr>
            </table>
        </center>
    </div>
    <div class="containerDiv">
        <div class="normalLink">
            <div class="categoryDiv">
                <div class="categoryTitle">CATEGORIES<label class="listIcon"><i class="bi bi-list-task"></i></label></div>
                <?php
                    $selectCategory = "select * from types_tbl order by typename asc";
                    $queryCategory = mysqli_query($con,$selectCategory);
                    if(mysqli_num_rows($queryCategory)> 0){
                        while($category = mysqli_fetch_assoc($queryCategory)){
                            ?>
                            <a href="?page=categories&pagename=<?php echo $category['typename']; ?>"><div class="categoryList"><?php echo ucfirst($category['typename']); ?></div></a>
                            <?php
                        }
                    }else{
                        echo"<center>No category</center>";
                    }
                ?>
            </div>
            <br><br>
            <div class="menuLinkList">
                <a href="?page=index&pagename=Lyuba Shop | Home"><div class="listLink"><i class="bi bi-house"></i> Home</div></a>
                <?php
                    if(isset($_SESSION['userID'])){
                        ?>
                        <a href="?page=profile&pagename=Profile"><div class="listLink"><i class="bi bi-person"></i> Profile</div></a>
                        <a href="?page=notification&pagename=Notification"><div class="listLink"><i class="bi bi-bell"></i> Notification <?php if($notiTotal >0){echo"<label class='label-not'><center>".$notiTotal."</center></label>";}?></div></a>
                        <?php
                    }
                ?>
            </div>
        </div>
        <div class="divBody">
            <?php include 'pages/'.$_GET['page'].'.php'; ?>
        </div>
    </div><br><br><br><br><br>
    <div class="footerDivLink">
        <center>
            <table width="100%">
                <tr>
                    <td class="linkFooter">
                        <center><a href="?page=index&pagename=Lyuba Shop | Home"><div><i class="bi bi-house"></i></div></a></center>
                    </td>
                    <td class="linkFooter">
                        <center><a href="?page=profile&pagename=Profile"><label><i class="bi bi-person"></i></label></a></center>
                    </td>
                    <td class="linkFooter">
                        <center><a href="?page=notification&pagename=Notification"><label><i class="bi bi-bell"></i><?php if($notiTotal >0){echo"<span class='labelnot'></span>";}?></label></a></center>
                    </td>
                    <input type="hidden" id="optionBtn" value="no">
                    <td>
                        <center><label class="buttonList" onclick="viewOption()"><i class="bi bi-list"></i></label></center>
                    </td>
                </tr>
            </table>
        </center>
    </div>
</body>
</html>

<script type="text/javascript">
    function viewOption(){
        var btn = document.getElementById('optionBtn').value;
        if(btn == "no"){
            document.getElementById('optionLink').style.width = "70%";
            document.getElementById('optionBtn').value = "yes";
        }else if(btn == "yes"){
            document.getElementById('optionLink').style.width = "0px";
            document.getElementById('optionBtn').value = "no";
        }
    }
</script>

<?php
    if(isset($_POST['submitSearch'])){
        $searchBox = $_POST['search'];
        echo "<script>location.href='?page=search&pagename=Result For ".$searchBox." &q=".$searchBox."';</script>";
    }
?>