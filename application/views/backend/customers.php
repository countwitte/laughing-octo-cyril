<script type="text/javascript" 
        src="<?php echo $base_url; ?>assets/js/libs/jquery/jquery-ui-timepicker-addon.js"></script>
        
<script type="text/javascript" 
        src="<?php echo $base_url; ?>assets/js/backend_customers.js"></script>
        
<script type="text/javascript">    
    var GlobalVariables = {
        'availableProviders': <?php echo json_encode($available_providers); ?>,
        'availableServices': <?php echo json_encode($available_services); ?>,
        'baseUrl': <?php echo '"' . $base_url . '"'; ?>,
        'customers': <?php echo json_encode($customers); ?>,
        'user'                  : {
            'id'        : <?php echo $user_id; ?>,
            'email'     : <?php echo '"' . $user_email . '"'; ?>,
            'role_slug' : <?php echo '"' . $role_slug . '"'; ?>,
            'privileges': <?php echo json_encode($privileges); ?>
        }
    };
    
    $(document).ready(function() {
        BackendCustomers.initialize(true);
    });
</script>

<div id="customers-page" class="row-fluid">
	<div id="filter-customers" class="filter-records column span4">
		<form class="input-append">
			<input class="key span12" type="text" />
            <button class="filter btn" type="submit" title="<?php echo $this->lang->line('filter'); ?>">
                    <i class="icon-search"></i>
                </button>
                <button class="clear btn" type="button" title="<?php echo $this->lang->line('clear'); ?>">
                    <i class="icon-repeat"></i>
                </button>
		</form>
        
        <h2><?php echo $this->lang->line('customers'); ?></h2>
        <div class="results"></div>
	</div>

	<div class="details span7 row-fluid">
        <div class="btn-toolbar">
            <div id="add-edit-delete-group" class="btn-group">
                <?php if ($privileges[PRIV_CUSTOMERS]['add'] == TRUE) { ?>
                <button id="add-customer" class="btn btn-primary">
                    <i class="icon-plus icon-white"></i>
                    <?php echo $this->lang->line('add'); ?>
                </button>
                <?php } ?>
                
                <?php if ($privileges[PRIV_CUSTOMERS]['edit'] == TRUE) { ?>
                <button id="edit-customer" class="btn" disabled="disabled">
                    <i class="icon-pencil"></i>
                    <?php echo $this->lang->line('edit'); ?>
                </button>
                <?php }?>
                
                <?php if ($privileges[PRIV_CUSTOMERS]['delete'] == TRUE) { ?>
                <button id="delete-customer" class="btn" disabled="disabled">
                    <i class="icon-remove"></i>
                    <?php echo $this->lang->line('delete'); ?>
                </button>
                <?php } ?>
            </div>
            
            <div id="save-cancel-group" class="btn-group" style="display:none;">
                <button id="save-customer" class="btn btn-primary">
                    <i class="icon-ok icon-white"></i>
                    <?php echo $this->lang->line('save'); ?>
                </button>
                <button id="cancel-customer" class="btn">
                    <i class="icon-ban-circle"></i>
                    <?php echo $this->lang->line('cancel'); ?>
                </button>
            </div>
        </div>
        
        <input id="customer-id" type="hidden" />
        
        <div class="span6" style="margin-left: 0;">
            <h2><?php echo $this->lang->line('details'); ?></h2>
            <div id="form-message" class="alert" style="display:none;"></div>
            
            <label for="first-name"><?php echo $this->lang->line('first_name'); ?> *</label>
            <input type="text" id="first-name" class="span11 required" />

            <label for="last-name"><?php echo $this->lang->line('last_name'); ?> *</label>
            <input type="text" id="last-name" class="span11 required" />

            <label for="email"><?php echo $this->lang->line('email'); ?> *</label>
            <input type="text" id="email" class="span11 required" />

            <label for="number-of-calls"><?php echo $this->lang->line('Number_of_calls'); ?> *</label>
            <input type="text" id="number-of-calls" class="span11 required" />
            
            <label for="appointment-scheduled"><?php echo $this->lang->line('Appointment_scheduled'); ?></label>
            <input type="checkbox" id="appointment-scheduled" value="1" checked />

            <label for="device-delivered"><?php echo $this->lang->line('Device_delivered'); ?></label>
            <input type="text" id="device-delivered" class = "span11" />

			<label for="device-recovered"><?php echo $this->lang->line('Device_recovered'); ?></label>
            <input type="text" id="device-recovered" class = "span11" />
							
			<label for="data-uploaded"><?php echo $this->lang->line('Data_uploaded'); ?></label>
            <input type="text" id="data-uploaded" class = "span11" />
            
            <label for="notes"><?php echo $this->lang->line('notes'); ?></label>
            <textarea id="notes" rows="4" class="span11"></textarea>
            
            <br/><br/>
            <center><em id="form-message" class="text-error">
                <?php echo $this->lang->line('fields_are_required'); ?></em></center>
        </div> 
        
        <div class="span5">
            <h2><?php echo $this->lang->line('appointments'); ?></h2>
            <div id="customer-appointments"></div>
            <div id="appointment-details"></div>
        </div>
	</div>
</div>