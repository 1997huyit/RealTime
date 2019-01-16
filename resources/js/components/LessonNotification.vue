 <template>
    <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fa fa-globe"></i>Notification<span class="badge  badge-danger" id="count-notification">
                                            {{lessons.length}}
                </span>
                </a>                 
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
           <a class="dropdown-item" href="#">
                                       {{ lesson.data }}
            </a>
            <a class="dropdown-item" href="#" v-if="lessons.length==0">
                No notifi
            </a>
        </div>
     </li>
 </template>
 <script>
    export default {
        props: ['lessons'],
    };
 </script>
 
 