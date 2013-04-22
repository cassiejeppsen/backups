</div>
</div><!-- #wrapper -->
  <div id="footer">
    <div id="colophon">
      <div id="site-info">
        <div class="footer container-fluid">
          <div class="footer-inner">
            <p class="quote">
            <?php
              srand((float) microtime() * 10000000);
              $input = array(
                array( quote => "Luck has nothing to do with it.",
                      author => "Serena Williams",
                    ),
                array( quote => "I don't run because I love the feeling of running. I run because it makes me love the feeling of living",
                      author => "Bonnie Pfiester",
                    ),
                array( quote => "Train like an athlete",
                      author => "Chalene Johnson",
                    ),
                array( quote => "A day for your ego is a great day for your soul.",
                      author => "Jillian Michaels",
                    ),
                array( quote => "Unless you puke, faint, or die, keep going.",
                      author => "Jillian Michaels",
                    ),
                array( quote => "You have to expect things of yourself before you can do them.",
                      author => "Michael Jordan",
                    ),
                array( quote => "Without self-discipline, success is impossible, period.",
                      author => "Lou Holtz",
                    ),
                array( quote => "It's easier to wake up early and workout than it is to look in the mirror each day and not like what you see.",
                      author => "Jayne Cox",
                    ),
                array( quote => "It's hard to beat a person who never gives up.",
                      author => "Babe Ruth",
                    ),
                array( quote => "It always seems impossible, until it's done.",
                      author => "Nelson Mandela",
                    ),
                array( quote => "Most people never run far enough on their first wind to find out they've got a second.",
                      author => "William James",
                    ),
                array( quote => "If you keep good food in your fridge, you will eat good food.",
                      author => "Errick McAdams",
                    ),
                array( quote => "You can't put a limit on anything.",
                      author => "Michael Phelps",
                    ),
                array( quote => "Things may come to those who wait, but only the things left by those who hustle.",
                      author => "Abraham Lincoln",
                    ),
                array( quote => "Strive for progress, not perfection.",
                      author => "Unknown",
                    ),
                array( quote => "Motivation is what gets you started. Habit is what keeps you going.",
                      author => " Jim Ryan",
                    ),
                array( quote => "The finish line is just the beginning of a whole new race.",
                      author => "Unknown",
                    ),
                array( quote => "If it doesn't challenge you, it doesn't change you.",
                      author => "Fred Devito",
                    ),
                array( quote => "The difference between try and triumph is a little umph.",
                      author => "Marvin Phillips",
                    ),
                array( quote => "Instead of giving myself reasons why I can't, I give myself reasons why I can.",
                      author => "Unknown",
                    ),
                array( quote => "Exercise is good for your mind, body, and soul.",
                      author => "Susie Michelle Cortright",
                    ),
                array( quote => "No pain, no gain.",
                      author => "Athletic Proverb",
                    ),
                array( quote => "It's not that some people have willpower and some don't. It's that some people are ready to change and others are not.",
                      author => "James Gordon",
                    ),
                array( quote => "Why choose to fail when success is an option.",
                      author => "Jillian Michaels",
                    ),
                array( quote => "You have no control over what the other guy does. You only have control over what you do.",
                      author => "A J Kitt",
                    ),
                array( quote => "Set your goals high, and don't stop until you get there.",
                      author => "Bo Jackson",
                    ),
                array( quote => "Strong is the new skinny.",
                      author => "Unknown",
                    ),
                array( quote => "You can feel sore tomorrow, or you can feel sorry tomorrow. You choose.",
                      author => "Unknown",
                    ),
                array( quote => "The secret to getting ahead is getting started.",
                      author => "Mark Twain",
                    ),
                array( quote => "You're only one workout away from a good mood.",
                      author => "Unknown",
                    ),
                array( quote => "Sweat is fat crying",
                      author => "Unknown",
                    ),
                array( quote => "I'm not telling you it's going to be easy - I'm telling you it's going to be worth it.",
                      author => "Art Williams",
                    ),
                array( quote => "To give anything less than your best is to sacrifice the gift.",
                      author => "Steve Prefontaine",
                    ),
                array( quote => "The only person you should be better than is the person you were yesterday.",
                      author => "Anonymous",
                    ),

                );

              $rand_key = array_rand($input, 2); 
              echo $input[$rand_key[0]]["quote"] . "\n"; 
              ?>
            <span class="author">-&nbsp;<?php echo $input[$rand_key[0]]["author"] . "\n";  ?></span></p>
            <ul class="footer-nav">
              <li><a href="/pricing">Pricing</a></li>
              <li>/<a href="http://support.ifit.com" target="_blank">Support</a></li>
              <li>/<a href="/privacypolicy">Legal</a></li>
              <li>/<a href="/contactus">Contact</a></li>
              <li>/<a href="/videoLibrary">Video</a></li>
              <li class="copywright"><p>Copyright © iFit.com, All rights reserved.</p></li>
            </ul>
            <div class="clear"></div>
          </div>
        </div>
      </div><!-- #site-info -->
    </div><!-- #colophon -->
  </div><!-- #footer -->

<?php wp_footer(); ?>
</body>
</html>

