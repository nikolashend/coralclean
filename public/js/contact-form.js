// Contact Form AJAX Handler
(function($) {
    'use strict';

    $(document).ready(function() {
        // Handle popup contact form
        $('.form-popup').on('submit', function(e) {
            e.preventDefault();
            
            var form = $(this);
            var submitBtn = form.find('input[type="submit"]');
            var originalValue = submitBtn.val();
            
            // Disable submit button
            submitBtn.prop('disabled', true).val('Отправка...');
            
            // Remove any existing alerts
            form.siblings('.alert').remove();
            
            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: form.serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Show success message
                        var alertBox = '<div class="alert alert-success" style="margin-top: 20px; padding: 15px; background: #d4edda; border: 1px solid #c3e6cb; color: #155724; border-radius: 4px; position: relative;">' +
                            '<button type="button" class="close" style="position: absolute; top: 10px; right: 15px; background: none; border: none; font-size: 20px; cursor: pointer; color: #155724;">&times;</button>' +
                            response.message +
                            '</div>';
                        
                        form.after(alertBox);
                        
                        // Add close button handler
                        form.siblings('.alert').find('.close').on('click', function() {
                            $(this).parent().fadeOut(400, function() {
                                $(this).remove();
                            });
                        });
                        
                        // Reset form
                        form[0].reset();
                        
                        // Remove message after 5 seconds
                        setTimeout(function() {
                            form.siblings('.alert-success').fadeOut(400, function() {
                                $(this).remove();
                            });
                        }, 5000);
                        
                        // Close popup if exists
                        setTimeout(function() {
                            if (typeof closeContactPanel === 'function') {
                                closeContactPanel();
                            }
                        }, 2000);
                    }
                },
                error: function(xhr) {
                    var errorMessage = 'Произошла ошибка. Попробуйте еще раз.';
                    
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errors = xhr.responseJSON.errors;
                        errorMessage = '<ul style="margin: 0; padding-left: 20px;">';
                        $.each(errors, function(field, messages) {
                            $.each(messages, function(index, message) {
                                errorMessage += '<li>' + message + '</li>';
                            });
                        });
                        errorMessage += '</ul>';
                    } else if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    
                    var alertBox = '<div class="alert alert-danger" style="margin-top: 20px; padding: 15px; background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; border-radius: 4px; position: relative;">' +
                        '<button type="button" class="close" style="position: absolute; top: 10px; right: 15px; background: none; border: none; font-size: 20px; cursor: pointer; color: #721c24;">&times;</button>' +
                        errorMessage +
                        '</div>';
                    
                    form.after(alertBox);
                    
                    // Add close button handler
                    form.siblings('.alert').find('.close').on('click', function() {
                        $(this).parent().fadeOut(400, function() {
                            $(this).remove();
                        });
                    });
                    
                    // Remove error message after 7 seconds
                    setTimeout(function() {
                        form.siblings('.alert-danger').fadeOut(400, function() {
                            $(this).remove();
                        });
                    }, 7000);
                },
                complete: function() {
                    // Re-enable submit button
                    submitBtn.prop('disabled', false).val(originalValue);
                }
            });
            
            return false;
        });

        // Handle footer contact form
        $('#footer-contact-form').on('submit', function(e) {
            e.preventDefault();
            
            var form = $(this);
            var submitBtn = form.find('input[type="submit"]');
            var originalValue = submitBtn.val();
            var messageDiv = $('#footer-form-message');
            
            // Disable submit button
            submitBtn.prop('disabled', true).val('Отправка...');
            
            // Clear previous messages
            messageDiv.html('');
            
            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: form.serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Show success message
                        messageDiv.html('<div class="alert alert-success" style="padding: 15px; background: #d4edda; border: 1px solid #c3e6cb; color: #155724; border-radius: 4px;">' +
                            response.message +
                            '</div>');
                        
                        // Reset form
                        form[0].reset();
                        
                        // Remove message after 5 seconds
                        setTimeout(function() {
                            messageDiv.fadeOut(400, function() {
                                $(this).html('').show();
                            });
                        }, 5000);
                    }
                },
                error: function(xhr) {
                    var errorMessage = 'Произошла ошибка. Попробуйте еще раз.';
                    
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errors = xhr.responseJSON.errors;
                        errorMessage = '<ul style="margin: 0; padding-left: 20px;">';
                        $.each(errors, function(field, messages) {
                            $.each(messages, function(index, message) {
                                errorMessage += '<li>' + message + '</li>';
                            });
                        });
                        errorMessage += '</ul>';
                    } else if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    
                    messageDiv.html('<div class="alert alert-danger" style="padding: 15px; background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; border-radius: 4px;">' +
                        errorMessage +
                        '</div>');
                    
                    // Remove error message after 7 seconds
                    setTimeout(function() {
                        messageDiv.fadeOut(400, function() {
                            $(this).html('').show();
                        });
                    }, 7000);
                },
                complete: function() {
                    // Re-enable submit button
                    submitBtn.prop('disabled', false).val(originalValue);
                }
            });
            
            return false;
        });
    });

})(jQuery);
