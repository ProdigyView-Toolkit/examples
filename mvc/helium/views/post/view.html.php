<?php

echo PVHtml::h1($post->title);

echo PVHtml::aLink('Edit', array('controller' => 'post', 'action' => 'edit', 'id' => $post -> post_id));

echo PVHtml::p($post->content);
