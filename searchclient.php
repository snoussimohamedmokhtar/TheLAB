
<form action="" method="GET" >
            <label for="numCmd">Filtrer par num client:</label>
            <input type="text" id="idclient" name="idclient">
            <input type="submit" value="Filtrer">
            </form>
                <?php 
            $dsn = "mysql:host=localhost;dbname=projetweb";
            $username = "root";
            $password = "";
            try {
                $conn = new PDO($dsn, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Filter by idclient if set in query string
                if(isset($_GET['idclient']) && $_GET['idclient'] !== ''){
                    $stmt = $conn->prepare("SELECT * FROM client WHERE idclient = :idclient");
                    $stmt->bindParam(':idclient', $_GET['idclient']);
                    $stmt->execute();
                }
                else{
                    $stmt = $conn->query("SELECT * FROM client");
                }
                
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
            ?>
                    <div class="col-md-6" align="center" style="padding: 10px; margin: 10px auto; text-align: center; width:70%; ">
                        <div  class="products-single fix" align="center" style="background-color: yellowgreen;">
                            <div class="box-img-hover" align="center">
                                <div class="why-text" align="center">
  
                                    
                                    <h1><strong><?php  echo  $row['firstname']; ?></strong></h1>
                                
                                    <p><?php echo $row['adresse']; echo "   |   "; echo $row['ville']; echo "   |   "; echo $row['idclient']; ?></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>