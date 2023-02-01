
// Creating JButtons.
import java.awt.*;
import java.awt.event.*;
import javax.swing.*;


public class ButtonTest extends JFrame  {
	
	private JButton plainButton, fancyButton;

	   // set up GUI
	   public ButtonTest()
	   {
	      super( "Testing Buttons" );

	      // get content pane and set its layout
	      Container container = getContentPane();
	      container.setLayout( new FlowLayout() );

	      // create buttons
	      plainButton = new JButton( "Plain Button" );
	      container.add( plainButton );

	      Icon bug1 = new ImageIcon( "bug1.gif" );
	      Icon bug2 = new ImageIcon( "bug2.gif" );
	      fancyButton = new JButton( "Fancy Button", bug1 );
	      fancyButton.setRolloverIcon( bug2 );
	      container.add( fancyButton );

	      setSize( 275, 100 );
	      setVisible( true );

	   } // end ButtonTest constructor

	   public static void main( String args[] )
	   { 
	      ButtonTest application = new ButtonTest();
	      application.setDefaultCloseOperation( JFrame.EXIT_ON_CLOSE );
	   }


}
