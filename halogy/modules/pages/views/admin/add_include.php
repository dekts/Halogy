<form method="post" action="<?php echo site_url($this->uri->uri_string()); ?>" class="default">
<div class="large-12 columns body">
	<div class="card">
		<div class="header">
			<div class="small-12 medium-6 large-4 columns left">
				<?php
					if ($type == 'C') $typeLink = 'css';
					elseif ($type == 'J') $typeLink = 'js';
					else $typeLink = '';
				?>
				<h2>Add <?php echo ($type == 'css' || $type == 'js') ? 'File' : 'Include'; ?></h2>
			</div>
			<div class="large-6 small-12 columns right">
				<input type="submit" value="Save Changes" class="small button success radius" />
				<a href="<?php echo site_url('/admin/pages/includes/'.$typeLink); ?>" class="small button radius">Back to Includes</a>
			</div>
		</div>

		<?php if ($errors = validation_errors()): ?>
			<div class="error">
				<?php echo $errors; ?>
			</div>
		<?php endif; ?>

		<?php if ($type == 'css'): ?>
		<div class="item">
			<label for="includeRef">Filename:</label>
			<p>Your file will be found at &ldquo;/css/filename.css&rdquo; (make sure you use the '.css' extension).</p>
			<?php echo @form_input('includeRef',set_value('includeRef', $data['includeRef']), 'id="includeRef" class="formelement"'); ?>
			
			<?php echo @form_hidden('type', 'C'); ?>
		</div>
		<?php elseif ($type == 'js'): ?>
		<div class="item">
			<label for="includeRef">Filename:</label>
			<p>Your file will be found at &ldquo;/js/filename.js&rdquo; (make sure you use the '.js' extension).</p>
			<?php echo @form_input('includeRef',set_value('includeRef', $data['includeRef']), 'id="includeRef" class="formelement"'); ?>

			<?php echo @form_hidden('type', 'J'); ?>
		</div>
		<?php else: ?>
		<div class="item">
			<label for="includeRef">Reference:</label>
			<p>To access this include just use {include:REFERENCE} in your template.</p>
			<?php echo @form_input('includeRef',set_value('includeRef', $data['includeRef']), 'id="includeRef" class="formelement"'); ?>

			<?php echo @form_hidden('type', 'H'); ?>
		</div>
		<?php endif; ?>

		<div class="item">
			<div class="markup">
				<label for="body">Markup:</label>	
				<?php echo @form_textarea('body',set_value('body', $data['body']), 'id="body" class="code editor"'); ?>
			</div>
		</div>
	</div>
</div>
	
</form>