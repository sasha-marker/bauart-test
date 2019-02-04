<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>

<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
               data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars" style="display: none;"></a>
            <a class="navbar-brand" href="/">ОТК</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Call Search -->
                <!-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i
                            class="material-icons">search</i></a></li> -->
                <!-- #END# Call Search -->
                <!-- Notifications -->
                <!-- <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                        <span class="label-count"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body">
                            <div class="slimScrollDiv"
                                 style="position: relative; overflow: hidden; width: auto; height: 254px;">
                                <ul class="menu" style="overflow: hidden; width: auto; height: 254px;">

                                </ul>
                                <div class="slimScrollBar"
                                     style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px;"></div>
                                <div class="slimScrollRail"
                                     style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                            </div>
                        </li>
                        <li class="footer">
                            <a href="javascript:void(0);" class=" waves-effect waves-block">View All Notifications</a>
                        </li>
                    </ul>
                </li> -->
                <!-- #END# Notifications -->
                <!-- Tasks -->
                <!-- <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">flag</i>
                        <span class="label-count"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">TASKS</li>
                        <li class="body">
                            <div class="slimScrollDiv"
                                 style="position: relative; overflow: hidden; width: auto; height: 254px;">
                                <ul class="menu tasks" style="overflow: hidden; width: auto; height: 254px;">
                                </ul>
                                <div class="slimScrollBar"
                                     style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px;"></div>
                                <div class="slimScrollRail"
                                     style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                            </div>
                        </li>
                        <li class="footer">
                            <a href="javascript:void(0);" class=" waves-effect waves-block">View All Tasks</a>
                        </li>
                    </ul>
                </li> -->
                <!-- #END# Tasks -->
                <li class="pull-right"><?= \yii\helpers\Html::a("<i class=\"material-icons\">input</i>
                            <span>Выход</span>", ['/site/logout'], ['class' => 'link-logout', 'data-method' => 'post']) ?></li>
            </ul>
        </div>
    </div>
</nav>
