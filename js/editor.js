wp.domReady( () => {

  wp.blocks.unregisterBlockStyle(
    'core/button',
    [ 'outline', 'squared', 'fill' ]
  );

  wp.blocks.unregisterBlockStyle(
    'core/separator',
    [ 'wide', 'dots' ],
  );

  wp.blocks.unregisterBlockStyle(
    'core/quote',
    [ 'default', 'large' ]
  );

  wp.blocks.registerBlockStyle(
    'core/heading',
    [
      {
        name: 'default',
        label: 'Default',
        isDefault: true,
      },
      {
        name: 'underline',
        label: 'Underline',
      }
    ]
  );

  wp.blocks.registerBlockStyle(
    'core/list',
    [
      {
        name: 'default',
        label: 'Default',
        isDefault: true,
      },
      {
        name: 'icon',
        label: 'Icon List',
      }
    ]
  );

});