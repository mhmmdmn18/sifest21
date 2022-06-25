<header class="mb-5">
    <div class="header-top pt-3 pb-2">
        <div class="container">
            <div class="logo" style="display: inline-flex;">
                <a href="index.php"><img src="../../assets/img/logo.png" alt="Logo" srcset=""></a>
                <h4 class="pt-1 ps-2">SI FEST 2021</h4>
            </div>

            <div class="header-top-right">

                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <ul>
                
                <li class="menu-item">
                    <a href="index.php" class='menu-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="user.php" class='menu-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>User</span>
                    </a>
                </li>

                <li class="menu-item has-sub">
                    <a href="#" class='menu-link'>
                        <i class="bi bi-file-earmark-check-fill"></i>
                        <span>Verifikasi</span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">

                                <li class="submenu-item">
                                    <a href="verifartikel.php" class='submenu-link'>Artikel 
                                        <?php
                                            if ($resultjmlhnoverif = mysqli_query($koneksi, "SELECT count(`bukti`) AS jml_noverif FROM `lombadaftar` WHERE verif = 0 AND lomba = 'artikel' OR verif > 1 AND lomba = 'artikel' ")) {
                                                $row =  mysqli_fetch_assoc($resultjmlhnoverif);
                                                if ($row['jml_noverif'] > 0 ) {
                                        ?>
                                        <span class="badge bg-warning text-dark">   
                                        <?php
                                                    echo $row['jml_noverif'];
                                                }
                                            }
                                        ?>     
                                        </span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="verifposter.php" class='submenu-link'>Poster
                                        <?php
                                            if ($resultjmlhnoverif = mysqli_query($koneksi, "SELECT count(`bukti`) AS jml_noverif FROM `lombadaftar` WHERE verif = 0 AND lomba = 'poster' OR verif > 1 AND lomba = 'poster' ")) {
                                                $row =  mysqli_fetch_assoc($resultjmlhnoverif);
                                                if ($row['jml_noverif'] > 0 ) {
                                        ?>
                                        <span class="badge bg-warning text-dark">  
                                        <?php
                                                    echo $row['jml_noverif'];
                                                }
                                            }
                                        ?>      
                                        </span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="verifuiux.php" class='submenu-link'>UI/UX
                                        <?php
                                            if ($resultjmlhnoverif = mysqli_query($koneksi, "SELECT count(`bukti`) AS jml_noverif FROM `lombadaftar` WHERE verif = 0 AND lomba = 'uiux' OR verif > 1 AND lomba = 'uiux' ")) {
                                                $row =  mysqli_fetch_assoc($resultjmlhnoverif);
                                                if ($row['jml_noverif'] > 0 ) {
                                        ?>
                                        <span class="badge bg-warning text-dark">  
                                        <?php
                                                    echo $row['jml_noverif'];
                                                }
                                            }
                                        ?>      
                                        </span>
                                    </a>
                                </li>

                                <li class="submenu-item  has-sub">
                                    <a href="#" class='submenu-link'>E-Sport
                                        <?php
                                            if ($resultjmlhnoverif = mysqli_query($koneksi, "SELECT count(`bukti`) AS jml_noverif FROM `lombadaftar` WHERE verif = 0 AND lomba IN ('ml', 'pubgm', 'valorsolo', 'valortim') OR verif > 1 AND lomba IN ('ml', 'pubgm', 'valorsolo', 'valortim') ")) {
                                                $row =  mysqli_fetch_assoc($resultjmlhnoverif);
                                                if ($row['jml_noverif'] > 0 ) {
                                        ?>
                                        <span class="badge bg-warning text-dark">  
                                        <?php
                                                    echo $row['jml_noverif'];
                                                }
                                            }
                                        ?>      
                                        </span>
                                    </a>
                                    <!-- 3 Level Submenu -->
                                    <ul class="subsubmenu">

                                        <li class="subsubmenu-item">
                                            <a href="verifml.php" class='subsubmenu-link'>ML
                                                <?php
                                                    if ($resultjmlhnoverif = mysqli_query($koneksi, "SELECT count(`bukti`) AS jml_noverif FROM `lombadaftar` WHERE verif = 0 AND lomba = 'ml' OR verif > 1 AND lomba = 'ml' ")) {
                                                        $row =  mysqli_fetch_assoc($resultjmlhnoverif);
                                                        if ($row['jml_noverif'] > 0 ) {
                                                ?>
                                                <span class="badge bg-warning text-dark">  
                                                <?php
                                                            echo $row['jml_noverif'];
                                                        }
                                                    }
                                                ?>      
                                                </span>
                                            </a>
                                        </li>
                                        <li class="subsubmenu-item">
                                            <a href="verifpubgm.php" class='subsubmenu-link'>PUBGM
                                                <?php
                                                    if ($resultjmlhnoverif = mysqli_query($koneksi, "SELECT count(`bukti`) AS jml_noverif FROM `lombadaftar` WHERE verif = 0 AND lomba = 'pubgm' OR verif > 1 AND lomba = 'pubgm' ")) {
                                                        $row =  mysqli_fetch_assoc($resultjmlhnoverif);
                                                        if ($row['jml_noverif'] > 0 ) {
                                                ?>
                                                <span class="badge bg-warning text-dark">  
                                                <?php
                                                            echo $row['jml_noverif'];
                                                        }
                                                    }
                                                ?>      
                                                </span>
                                            </a>
                                        </li>
                                        <li class="subsubmenu-item">
                                            <a href="verifvalorsolo.php" class='subsubmenu-link'>Valorant (Solo)
                                                <?php
                                                    if ($resultjmlhnoverif = mysqli_query($koneksi, "SELECT count(`bukti`) AS jml_noverif FROM `lombadaftar` WHERE verif = 0 AND lomba = 'valorsolo' OR verif > 1 AND lomba = 'valorsolo' ")) {
                                                        $row =  mysqli_fetch_assoc($resultjmlhnoverif);
                                                        if ($row['jml_noverif'] > 0 ) {
                                                ?>
                                                <span class="badge bg-warning text-dark">  
                                                <?php
                                                            echo $row['jml_noverif'];
                                                        }
                                                    }
                                                ?>      
                                                </span>
                                            </a>
                                        </li>
                                        <li class="subsubmenu-item">
                                            <a href="verifvalortim.php" class='subsubmenu-link'>Valorant (Tim)
                                                <?php
                                                    if ($resultjmlhnoverif = mysqli_query($koneksi, "SELECT count(`bukti`) AS jml_noverif FROM `lombadaftar` WHERE verif = 0 AND lomba = 'valortim' OR verif > 1 AND lomba = 'valortim' ")) {
                                                        $row =  mysqli_fetch_assoc($resultjmlhnoverif);
                                                        if ($row['jml_noverif'] > 0 ) {
                                                ?>
                                                <span class="badge bg-warning text-dark">  
                                                <?php
                                                            echo $row['jml_noverif'];
                                                        }
                                                    }
                                                ?>      
                                                </span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>
                </li>

                <li class="menu-item">
                    <a href="artikel.php" class='menu-link'>
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span>Artikel</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="poster.php" class='menu-link'>
                        <i class="bi bi-file-earmark-richtext-fill"></i>
                        <span>Poster</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="uiux.php" class='menu-link'>
                        <i class="bi bi-file-earmark-post-fill"></i>
                        <span>UI/UX</span>
                    </a>
                </li>

                <li class="menu-item has-sub">
                    <a href="#.php" class='menu-link'>
                        <i class="bi bi-file-earmark-play-fill"></i>
                        <span>E-Sport</span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">

                                <li class="submenu-item">
                                    <a href="ml.php" class='submenu-link'>ML</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="pubgm.php" class='submenu-link'>PUBGM</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="valorsolo.php" class='submenu-link'>Valorant (Solo)</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="valortim.php" class='submenu-link'>Valorant (Tim)</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </li>

                <li class="menu-item has-sub">
                    <a href="#" class='menu-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>Akun Saya</span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">

                                <li class="submenu-item">
                                    <a href="../logout.php" class='submenu-link'>Logout</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
</header>