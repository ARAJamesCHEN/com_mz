 <main class="post-main">
	    <section class="breadcrumbs">
			<ul class="display-flex">
				<li><a href="#" rel="nofollow">Forums</a></li>
				<li><a href="post.html" rel="nofollow"><?php echo $formBean->boardName ?></a></li>
			</ul>
		</section>
		<section class="post-content">
			<div class="forum-section__top">
		        <div class="forum-head-one">
		            <h1> <?php echo $formBean->question?></h1>
			    </div>
			</div>
			<div>
				<div class="forum-bar">
                    <a href="#" class="btn" rel="nofollow">Reply to this topic</a>
                </div>

				<div>
					<section class="forum-messages">
						<div id="post1" class="message">
						    <div class="avatar-user js-avatar-user" data-user-slug="james" data-user-profile="#">
							    <div class="avatar-user__container">
								     <a href="#" class="avatar">
									     <div class="img">
										     <img alt="Avatar image for James" src="./static/images/user.jpg">
										 </div>
									</a>
									<dl class="user-info hide-mobile">
									    <dt class="user-info__name">
										    <a href="#"><?php echo $formBean->usrName?></a>
										</dt>
										<dd class="user-info__item">
										</dd>
										<dd class="user-info__item">
										    <span>Member Since:</span> December 1, 2017
                                        </dd>
										<dd class="user-info__item">
										    <span>Posts:</span> <?php echo $formBean->usrPostNum ?>
										</dd>
									</dl>
								</div>
							</div>

							<div class="message-wrap">
								<div class="message-inner">
									<div class="message-title">
                                        Posted by <a href="#"><?php $formBean->usrName?></a>(<?php $formBean->usrPostNum ?> posts)
										<span class="icon icon-time"> <?php echo $formBean->postDate ?></span>
									</div>
									<div class="message-breadcrumb"></div>
									<div class="message-content">
										<article class="content-body message-body js-message-body typography-format">
											<div class="poll">
												<div class="poll-header">
													<h3>
														<span>
															<i class="icon icon-align-left"></i>
                                                             Poll:
														</span>
                                                        <?php$formBean->question?> (<?php echo $formBean->votedNum ?> votes)
													</h3>
												</div>
												<form class="js-poll-form" data-ajaxform="true">
												    <div>
                                                        Theseus 80%
                                                        <?php echo $formBean->optionName.' '.$formBean->optionNameVoteRate.'%' ;  ?>
                                                    </div>
													<div class="progress progress-success"><div class="bar" style="width: 80%;"></div></div>
													<div>
                                                        Minotaur 20%
                                                        <?php echo $formBean->optionName.' '.$formBean->optionNameVoteRate.'%' ;  ?>
													</div>
													<div class="progress "><div class="bar" style="width: 20%;"></div></div>
												</form>
											</div>
										</article>
									</div>
									<div class="message-options">
										<a rel="reply" href="#forum_message_33428830" class="btn btn-mini btn-primary">Reply</a>
									</div>
							   </div>
							</div>
					    </div>

						<div id="post2" class="message message-plus">
						    <div class="avatar-user js-avatar-user" data-user-slug="james" data-user-profile="#">
							    <div class="avatar-user__container">
								     <a href="#" class="avatar">
									     <div class="img">
										     <img alt="Avatar image for James" src="./static/images/user2.jpg">
										 </div>
									</a>
									<dl class="user-info hide-mobile">
									    <dt class="user-info__name">
										    <a href="#">Amit</a>
										</dt>
										<dd class="user-info__item">
										</dd>
										<dd class="user-info__item">
										    <span>Member Since:</span> December 1, 2015
                                        </dd>
										<dd class="user-info__item">
										    <span>Posts:</span> 20
										</dd>
									</dl>
								</div>
							</div>

							<div class="message-wrap">
								<div class="message-inner">
									<div class="message-title">
                                        Posted by <a href="#">Amit</a>(20 posts)
										<span class="icon icon-time"> 1 year, 7 months ago</span>
									</div>
									<div class="message-breadcrumb"></div>
									<div class="message-content">
										<article class="content-body message-body js-message-body typography-format">
											<div class="poll-content-words">
												<p> Minotaur! </p>
											</div>
										</article>
									</div>
							   </div>
							</div>
					    </div>
						<div id="post2" class="message message-plus">
						    <div class="avatar-user js-avatar-user" data-user-slug="james" data-user-profile="#">
							    <div class="avatar-user__container">
								     <a href="#" class="avatar">
									     <div class="img">
										     <img alt="Avatar image for James" src="./static/images/user1.jpg">
										 </div>
									</a>
									<dl class="user-info hide-mobile">
									    <dt class="user-info__name">
										    <a href="#">Mike</a>
										</dt>
										<dd class="user-info__item">
										</dd>
										<dd class="user-info__item">
										    <span>Member Since:</span> December 1, 2015
                                        </dd>
										<dd class="user-info__item">
										    <span>Posts:</span> 20
										</dd>
									</dl>
								</div>
							</div>

							<div class="message-wrap">
								<div class="message-inner">
									<div class="message-title">
                                        Posted by <a href="#">Mike</a>(20 posts)
										<span class="icon icon-time"> 1 year, 3 months ago</span>
									</div>
									<div class="message-breadcrumb"></div>
									<div class="message-content">
										<article class="content-body message-body js-message-body typography-format">
											<div class="poll-content-words">
												<p> both... ! </p>
											</div>
										</article>
									</div>
							   </div>
							</div>
					    </div>
						<div id="post3" class="message message-plus">
						    <div class="avatar-user js-avatar-user" data-user-slug="james" data-user-profile="#">
							    <div class="avatar-user__container">
								     <a href="#" class="avatar">
									     <div class="img">
										     <img alt="Avatar image for James" src="./static/images/user3.jpg">
										 </div>
									</a>
									<dl class="user-info hide-mobile">
									    <dt class="user-info__name">
										    <a href="#">Rob</a>
										</dt>
										<dd class="user-info__item">
										</dd>
										<dd class="user-info__item">
										    <span>Member Since:</span> December 1, 2017
                                        </dd>
										<dd class="user-info__item">
										    <span>Posts:</span> 100
										</dd>
									</dl>
								</div>
							</div>

							<div class="message-wrap">
								<div class="message-inner">
									<div class="message-title">
                                        Posted by <a href="#">Rob</a>(100 posts)
										<span class="icon icon-time"> 2 days, 4 hours ago</span>
									</div>
									<div class="message-breadcrumb"></div>
									<div class="message-content">
										<article class="content-body message-body js-message-body typography-format">
											<div class="poll">

											<div class="poll-content-words">
												<p> Theseus! </p>
											</div>
										</article>
									</div>
							   </div>
							</div>
					    </div>
					</section>
				</div>
			</section>
	</main>