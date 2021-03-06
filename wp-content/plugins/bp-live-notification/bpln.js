/*BuddyPress Live Notification Javascript*/
jQuery(document).ready(function(){
    var jq = jQuery;
    //on first run, store the ids in the bpln element
    update_ids( jq.trim( jq( "#bpln-notification-ids" ).text() ) );//store

//BuddyPress Live Notification Helper Object
BPLN_Helper = {
    interval: 0,
    check_update: function(){
        
            BPLN_Helper.reset_interval();//reset interval
            //post data
            jq.post(ajaxurl,{
                            action: 'bpln_check_notification',
                            cookie: encodeURIComponent(document.cookie),
                            //'_wpnonce_post_update': jq("input#_wpnonce_post_update").val(),
                            notification_ids: get_ids()
                            },
                            
                        function( data ){
                          
                            BPLN_Helper.set_interval();//set the interval again
                          
                            if( !data )
                                return;

                          //data = JSON.parse( data );
                          
                          if( data.change == 'yes' ){
                                //if we have change in notifications
                                update_ids( data.current_ids.join(",") );//store current ids
                                //update the notification count/message in buddypress admin bar
                                if( jq("li#bp-adminbar-notifications-menu").get(0) )
                                    jq("li#bp-adminbar-notifications-menu").replaceWith( data.notification_all );
                                else if(jq('li#wp-admin-bar-bp-notifications').get(0))
                                    jq("li#wp-admin-bar-bp-notifications").html(data.notification_all);
                                //notify using growl style notification, do u have a better bsuggestion ?
                              for(var i=0;i<data.messages.length;i++)
                                BPLN_Helper.notify(data.messages[i]);//notify each message
                        }

                }, 'json' );//end of post
},

    set_interval:function(){
            this.interval=setInterval("BPLN_Helper.check_update()",10000);//10 seconds
},

    reset_interval:function(){
             clearInterval(this.interval);;
},
    notify: function (msg){
    jq.achtung({message: msg, timeout:10});//show for 10 seconds
 }
}//end of helper object

//helper functions

//add as comma separated values
function update_ids($ids_array){
    jq("#bpln-notification-ids").data("notification_ids",$ids_array);
}
//return comma sep[arated values
function get_ids(){
    return jq("#bpln-notification-ids").data("notification_ids");
}

//setup timer
BPLN_Helper.set_interval();
});//end of jq(document).ready()

/*include the achtung.js here*/
/**
 * achtung 0.3.0
 *
 * Growl-like notifications for jQuery
 *
 * Copyright (c) 2009 Josh Varner <josh@voxwerk.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @license http://www.opensource.org/licenses/mit-license.php
 * @author Josh Varner <josh@voxwerk.com>
 */

eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(8($){$.S.6=8(4){f s=(X 4===\'1l\'),c=1i.H.C.17(1f,0),Q=\'6\';k 2.1m(8(){f n=$.14(2,Q);a(s&&4.1n(0,1)===\'1k\'){k 2}(!n&&!s&&$.14(2,Q,1q $.6(2)).1g(c));(n&&s&&$.U(n[4])&&n[4].F(n,c.C(1)))})};$.6=8(y){f c=1i.H.C.17(1f,0),$t;a(!y||!y.1o){$t=$(\'<L />\');k $t.6.F($t,c)}2.$5=$(y)};$.B($.6,{1p:\'0.3.0\',$i:d,19:{b:10,V:d,9:d,e:\'\',J:d,K:{\'11\':\'A\',\'W\':\'A\'},P:{\'11\':\'A\',\'W\':\'A\'},Y:R,15:1r}});$.B($.6.H,{$5:d,u:d,4:{},1g:8(c){f o,7=2;c=$.1E(c)?c:[];c.1d($.6.19);c.1d({});o=2.4=$.B.F($,c);a(!$.6.$i){$.6.$i=$(\'<L 1K="6-i"></L>\').16(1G.1H)}a(!o.V){$(\'<h E="6-l-M N-9 N-9-l">x</h>\').1I(8(){7.l()}).I(8(){$(2).q(\'6-l-M-I\')},8(){$(2).O(\'6-l-M-I\')}).1J(2.$5)}2.T(o.9,1h);a(o.g){2.$5.1M($(\'<h E="6-g">\'+o.g+\'</h>\'))}(o.e&&2.$5.q(o.e));(o.m&&2.$5.m(o.m));2.$5.q(\'6\').16($.6.$i);a(o.K){2.$5.1e(o.K,o.Y)}r{2.$5.1L()}a(o.b>0){2.b(o.b)}},b:8(b){f 7=2;a(2.u){1F(2.u)}2.u=1x(8(){7.l()},b*1w);2.4.b=b},12:8(p){f 7=2;a(2.4.e===p){k}2.$5.w(8(){a(!7.4.J||/18/.1a(1b.1c.13())||!$.U($.S.v)){7.$5.O(7.4.e);7.$5.q(p)}r{7.$5.v(7.4.e,p,R)}7.4.e=p;7.$5.z()})},T:8(j,D){f 7=2;a((D!==1h||j===d)&&2.4.9===j){k}a(D||2.4.9===d){2.$5.1s($(\'<h E="6-g-9 N-9 \'+j+\'" />\'));2.4.9=j;k}r a(j===d){2.$5.1t(\'.6-g-9\').G();2.4.9=d;k}2.$5.w(8(){f $h=$(\'.6-g-9\',7.$5);a(!7.4.J||/18/.1a(1b.1c.13())||!$.U($.S.v)){$h.O(7.4.9);$h.q(j)}r{$h.v(7.4.9,j,R)}7.4.9=j;7.$5.z()})},1j:8(Z){2.$5.w(8(){$(\'.6-g\',$(2)).1u(Z);$(2).z()})},1y:8(4){(4.e&&2.12(4.e));(4.m&&2.$5.m(4.m));(X(4.9)!==\'1z\'&&2.T(4.9));(4.g&&2.1j(4.g));(4.b&&2.b(4.b))},l:8(){f o=2.4,$5=2.$5;a(o.P){2.$5.1e(o.P,o.15)}r{2.$5.1D()}$5.w(8(){$5.1C(\'6\');$5.G();a($.6.$i&&$.6.$i.1B(\':1A\')){$.6.$i.G();$.6.$i=d}$5.z()})}})})(1v);',62,111,'||this||options|container|achtung|self|function|icon|if|timeout|args|false|className|var|message|span|overlay|newIcon|return|close|css|instance||newClass|addClass|else|isMethodCall|el|closeTimer|switchClass|queue||element|dequeue|toggle|extend|slice|force|class|apply|remove|prototype|hover|animateClassSwitch|showEffects|div|button|ui|removeClass|hideEffects|name|500|fn|changeIcon|isFunction|disableClose|height|typeof|showEffectDuration|newMessage||opacity|changeClass|toLowerCase|data|hideEffectDuration|appendTo|call|webkit|defaults|test|navigator|userAgent|unshift|animate|arguments|_init|true|Array|changeMessage|_|string|each|substring|nodeType|version|new|700|prepend|find|html|jQuery|1000|setTimeout|update|undefined|empty|is|removeData|hide|isArray|clearTimeout|document|body|click|prependTo|id|show|append'.split('|'),0,{}))


