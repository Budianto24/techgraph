<!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        CONTROL PANEL
                    </a>
                </li>
                <li>
                    <a href="../" target="_blank"><span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp; VISIT SITE</a>
                </li>
                <li>
                    <a href="../dashboard"><span class="fa fa-th-large"></span>&nbsp;&nbsp; DASHBOARD</a>
                </li>
                <li>
                    <a href="post"><span class="fa fa-pencil"></span>&nbsp;&nbsp; POSTS</a>
                </li>
                <li>
                    <a href="comments"><span class="fa fa-comments"></span>&nbsp;&nbsp; COMMENTS</a>
                </li>
                <li>
                    <a href="guestbook"><span class="fa fa-book"></span>&nbsp;&nbsp; GUESTBOOKS</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
<div class="header">
	<div id="toggle"><a href="#menu-toggle" class="btn btn-primary" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger"></span></a></div>
		<div id="author">
			<div class="dropdown">
				<a id="dLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<b><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $_SESSION['name']?></b>
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu" aria-labelledby="dLabel">
					<li><a href="logout">Logout</a></li>
				</ul>
			</div>
		</div>
</div>