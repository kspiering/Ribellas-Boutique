<?php
require "logout.php";
performLogout();

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../assets/css/cms-nav.css">
    <header>
        <div class="top" id="top"></div>
        <section class="logo">
                    <img src="../assets/images/WebP/Logo-big.webp" alt="Logo Ribellas Boutique">
                </section>
                <nav class="nav-header">
                    <ul>
                        <li><a href="../cms-dashboard">Dashboard</a></li>
                        <li><a href="../cms-register">Register new admin</a></li>
                        <li><a href="../cms-blogposts">All blogs</a></li>
                        <li><a href="../cms-create-blog">Create blog</a></li>
                        <li>
                            <form action="" method="POST">
                                <div class="logout">
                                <button type="submit" name="logout" id="logout">Logout</button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </nav>
        
                <nav class="burger-menu">
                    <div class="burger">
                        <div class="burger-icon" id="burger-icon">
                        <div class="burger-line"></div>
                        <div class="burger-line"></div>
                        <div class="burger-line"></div>
                    </div>
                      </div>
                      <div class="mobile-navigation">
                        <ul class="nav-list" id="mobile-nav-content">
                            <div class="nav">
                                <li><a href="../cms-dashboard">Dashboard</a></li>
                                <li><a href="../cms-register">Register new admin</a></li>
                                <li><a href="../cms-blogposts">All blogs</a></li>
                                <li><a href="../cms-create-blog">Create blog</a></li>
                                <li class="exit" id="exit">&times;</li>
                                    <li> <form action="" method="POST">
                                        <div class="buttons">
                                            <button type="submit" name="logout" id="logout">Logout</button>
                                        </div>
                                    </form>
                                </li>
                              
                            </div>
                        </ul>
                    </div>

                </nav>
            </header>
