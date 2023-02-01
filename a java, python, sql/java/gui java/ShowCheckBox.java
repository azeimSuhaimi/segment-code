
import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

public  class ShowCheckBox extends JFrame implements ActionListener,ItemListener
{
	private JLabel lbl1,lbl2,lbl3;
	private JTextField tf1;
	private JCheckBox cb1,cb2,cb3;
	private JRadioButton r1,r2,r3;
	
	ShowCheckBox()
	{
		setLayout( new BorderLayout());
		
		tf1 = new JTextField(5);
		tf1.setHorizontalAlignment(SwingConstants.RIGHT);
				
		lbl1 = new JLabel("enter price : RM");
		lbl2 = new JLabel("Choose discount");
		lbl3 = new JLabel("Total payment is ____________");
		r1 = new JRadioButton("10%");
		r2 = new JRadioButton("50%");
		r3 = new JRadioButton("70%");
		
		ButtonGroup bg = new ButtonGroup();
		bg.add(r1);
		bg.add(r2);
		bg.add(r3);
		
		cb1 = new JCheckBox("10%",false);
		cb2 = new JCheckBox("50%",false);
		cb3 = new JCheckBox("70%",false);
		
		ButtonGroup bg2 = new ButtonGroup();
		bg2.add(cb1);
		bg2.add(cb2);
		bg2.add(cb3);
		
		JPanel p = new JPanel();
		p.setLayout(new FlowLayout(FlowLayout.LEFT,10,10));
		p.add(lbl1);
		p.add(tf1);
		p.add(lbl2);
		
		JPanel p2 = new JPanel();
		p2.setLayout(new FlowLayout(FlowLayout.CENTER));
		
		p2.add(r1);
		p2.add(r2);
		p2.add(r3);
		p2.add(cb1);
		p2.add(cb2);
		p2.add(cb3);
		
		add(p,BorderLayout.NORTH);
		add(p2,BorderLayout.CENTER);
		add(lbl3, BorderLayout.SOUTH);
		
		r1.addActionListener(this);
		r2.addActionListener(this);
		r3.addActionListener(this);
		
		cb1.addItemListener(this);
		cb2.addItemListener(this);
		cb3.addItemListener(this);
		
		
	}
	
	public void itemStateChanged(ItemEvent e)
	{
		double price = Double.parseDouble(tf1.getText());
		double dis = 0;
		double total = 0.0;
		
		if(cb1.isSelected())
		{
			dis = 0.10;
		}
		else if(cb2.isSelected())
		{
			dis = 0.50;
		}
		else if(cb3.isSelected())
		{
			dis = 0.70;
		}
		
		total = price - (price * dis);
		
		lbl3.setText("total payment is RM "+ total);
		
	}
	
	
	public void actionPerformed(ActionEvent e)
	{
		double price = Double.parseDouble(tf1.getText());
		double dis = 0;
		double total = 0.0;
		
		if(r1.isSelected())
		{
			dis = 0.10;
		}
		else if(r2.isSelected())
		{
			dis = 0.50;
		}
		else if(r3.isSelected())
		{
			dis = 0.70;
		}
		
		total = price - (price * dis);
		
		lbl3.setText("total payment is RM "+ total);
		
	}
	
	public static void main(String args[])
	{
		ShowCheckBox f = new ShowCheckBox();
		f.setVisible(true);
		f.pack();
		f.setTitle("price after discount");
		f.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	}

}
